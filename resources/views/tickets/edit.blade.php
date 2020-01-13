@extends ('layouts.app')

@section ('page_title')
    Ticketing System | Ticket assigned to {{ $ticket -> name }}
@endsection

@section ('page_heading')
    Ticket assigned to {{ $ticket -> name }}
@endsection

@section ('content')
    <form action = "/ticket/{{ $ticket -> id }}/edit/" method="POST">
        <fieldset>
            @csrf
            
            <label>Assigned to</label>
            <input class="input" type="text" name="name" value="{{ $ticket -> name }}">

            <label>Ticket</label>
            <input class="input" type="text" name="ticket" value="{{ $ticket -> ticket }}" autofocus>

            <label>Status</label>
            <select class="input" name="status">
                <option value="new">new</option>
                <option value="open">open</option>
                <option value="closed">closed</option>
            </select>


            <button type="submit">Save Changes</button>

        </fieldset>
    </form>

<p>
    <a class="button" href="/">Back</a>
</p>
@endsection