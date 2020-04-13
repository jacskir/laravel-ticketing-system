@extends ('layouts.app')

@section ('page_title')
    Ticketing System | Ticket assigned to {{ $ticket->assignee->name }}
@endsection

@section ('content')
<div class="box">
    <table class="table is-striped is-hoverable is-fullwidth">
        <tbody>
            <tr>
                <td class="shrink">Assigned to:</td>
                <td>{{ $ticket->assignee->name }}</td>
            </tr>
            <tr>
                <td class="shrink">Assigned by:</td>
                <td>{{ $ticket->assigner->name }}</td>
            </tr>
            <tr>
                <td class="shrink">Status:</td>
                <td>{{ $ticket->status }}</td>
            </tr>
            <tr>
                <td class="shrink">Created at:</td>
                <td>{{ $ticket->created_at->format('D jS M Y') }}</td>
            </tr>
            <tr>
                <td class="shrink">Updated at:</td>
                <td>{{ $ticket->updated_at->format('D jS M Y') }}</td>
            </tr>
            <tr>
                <td class="shrink">Ticket:</td>
                <td><textarea class="textarea" readonly>{{ $ticket->ticket }}</textarea></td>
            </tr>
            <tr>
                <td class="shrink">Assignee notes:</td>
                <td><textarea class="textarea" readonly>{{ $ticket->assignee_notes }}</textarea></td>
            </tr>
        </tbody>
    </table>

    <a class="button is-light" href="/">Back</a>
</div>
@endsection