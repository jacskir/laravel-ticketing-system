<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use App\Mail\TicketAssigned;
use App\Mail\TicketClosed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    const RULES = [
        'assignee_id' => 'required|numeric|exists:users,id',
        'ticket' => 'required|string|min:2|max:256',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->filter;

        if ($filter === 'assigned-to-me') {
            $tickets = auth()->user()->assigneeTickets()->paginate(5);
            $tickets->appends(['filter' => $filter])->links();
        }
        else if ($filter === 'assigned-by-me') {
            $tickets = auth()->user()->assignerTickets()->paginate(5);
            $tickets->appends(['filter' => $filter])->links();
        }
        else {
            if (auth()->user()->is_admin) {
                $tickets = Ticket::paginate(5);
            } else {
                $tickets = Ticket::
                where('assignee_id', auth()->user()->id)
                    ->orWhere('assigner_id', auth()->user()->id)
                    ->paginate(5);
            }
        }
        
        return view('index', compact('tickets', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        
        return view('tickets.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(self::RULES);

        $ticket = Ticket::make([
            'ticket' => $request->input('ticket'),
            'status' => 'new',
        ]);
        $ticket->assignee()->associate($request->input('assignee_id'));
        $ticket->assigner()->associate($request->user()->id);
        
        $ticket->save();

        Mail::to($ticket->assignee->email)
            ->send(new TicketAssigned(
                $ticket->id,
                $ticket->assignee->name,
                $ticket->assigner->name
        ));

        return redirect()->action('TicketController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $users = User::orderBy('name')->get();

        return view('tickets.edit', compact('ticket', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $rules = self::RULES;
        $rules['status'] = 'required|string|in:new,open,closed';
        $rules['assignee_notes'] = 'string|nullable|max:256';

        $request->validate($rules);

        $priorStatus = $ticket->status;

        $ticket->fill([
            'ticket' => $request->input('ticket'),
            'status' => $request->status,
            'assignee_notes' => $request->input('assignee_notes'),
        ]);
        $ticket->assignee()->associate($request->input('assignee_id'));

        $ticket->save();

        if (($ticket->status === 'closed') && ($priorStatus != 'closed')) {
            Mail::to($ticket->assigner->email)
                ->send(new TicketClosed(
                    $ticket->id,
                    auth()->user()->name,
                    $ticket->assigner->name
            ));
        }

        return redirect()->action('TicketController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);
        
        $ticket->delete();
        return redirect()->action('TicketController@index');
    }
}
