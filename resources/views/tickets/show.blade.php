@extends ('layouts.app')

@section ('page_title')
    Ticketing System | Ticket assigned to {{ $ticket -> name }}
@endsection

@section ('page_heading')
    Ticket assigned to {{ $ticket -> name }}
@endsection

@section ('content')
<div class="box">
    <table class="table is-striped">
        <tbody>
            <tr>
                <td>Assigned to:</td>
                <td>{{ $ticket -> name }}</td>
            </tr>
            <tr>
                <td>Created at:</td>
                <td>{{ $ticket -> created_at -> format('D jS M Y') }}</td>
            </tr>
            <tr>
                <td>Updated at:</td>
                <td>{{ $ticket -> updated_at -> format('D jS M Y') }}</td>
            </tr>
            <tr>
                <td>Ticket: </td>
                <td>{{ $ticket -> ticket }}</td>
            </tr>
        </tbody>
    </table>
</div>

<p>
    <a class="button is-link is-light" href="/">Back</a>
</p>
@endsection