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
                <td>Date:</td>
                <td>{{ $ticket -> created_at -> format('D jS F') }}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $ticket -> ticket }}</td>
            </tr>
        </tbody>
    </table>
</div>

<p>
    <a class="button" href="/">Back</a>
</p>
@endsection