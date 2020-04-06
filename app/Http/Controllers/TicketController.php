<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    const RULES = [
        'name' => 'required|min:3|max:64',
        'ticket' => 'required|min:2|max:256',
        'status' => 'required',
    ];

    const MESSAGES = [
        'name.required' => 'The assignee\'s name is required.',
        'name.min' => 'The assignee\'s name must be at least 3 characters.',
        'name.max' => 'The assignee\'s name may not be greater than 64 characters.',
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
        return view('tickets.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate (self::RULES, self::MESSAGES);

        Ticket::create ([
            'name' => $request->input('name'),
            'ticket' => $request->input('ticket'),
            'status' => $request->input('status'),
        ]);
        return redirect () -> action ('TicketController@index');
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
        return view('tickets.edit', compact('ticket'));
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
        $request -> validate (self::RULES, self::MESSAGES);

        $ticket->update([
            'name' => $request->name,
            'ticket' => $request->ticket,
            'status' => $request->status
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
