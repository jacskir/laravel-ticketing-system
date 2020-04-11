<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;

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
    public function index()
    {
        $tickets = Ticket::paginate(5);

        return view('index', compact('tickets'));
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
        $rules = self::RULES;
        $rules['status'] = 'required|string';

        $request->validate($rules);

        $ticket->update([
            'user_id' => $request->user_id,
            'ticket' => $request->ticket,
            'status' => $request->status,
        ]);
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
        $ticket->delete();
        return redirect()->action('TicketController@index');
    }
}
