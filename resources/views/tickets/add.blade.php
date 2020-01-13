@extends ('layouts.app')

@section ('page_title')
    Ticketing System | Add a ticket
@endsection

@section ('content')
    <form action = "/add/" method="POST">
        <fieldset>
            @csrf

            <label>Assign to</label>
            <input class="input" type="text" name="name" placeholder="Enter assignee">
            
            <label>Ticket</label>
            <input class="input" type="text" name="ticket" placeholder="Enter the Ticket">

            <label>Status</label>
            <select class="input" name="status">
                <option value="new">new</option>
                <option value="open">open</option>
                <option value="closed">closed</option>
            </select>
            
            <button type="submit">Add Ticket</button>
        </fieldset>
    </form>
    <p>
    <a href="/">Back</a>
    </p>
@endsection