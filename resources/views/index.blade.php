@extends ('layouts.app')

@section ('page_title')
    Ticketing System
@endsection

@section ('page_heading')
    Ticketing System
@endsection


@section ('content')
    <table class="table is-striped is-hoverable">
        <thead>
            <th>Assigned to</th>
            <th>Ticket</th>
            <th>Status</th>
            <th>Date updated</th>
        </thead>
        <tbody>
            @foreach ($tickets as $t)
                <tr>
                    <td>{{ $t->user->name }}</td>
                    <td>{{ $t->ticket }}</td>
                    <td>{{ $t->status }}</td>
                    <td>{{ $t->updated_at->format('D jS M Y') }}</td>
                    <td>
                        <div class="field is-grouped">
                            <a class="button" href="/ticket/{{ $t->id }}/">
                                <ion-icon name="eye"></ion-icon>
                            </a>
                            <a class="button" href="/ticket/{{ $t->id }}/edit/">
                                <ion-icon name="create"></ion-icon>
                            </a>
                            <a class="button" href="/ticket/{{ $t->id }}/delete/">
                                <ion-icon name="trash"></ion-icon>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tickets->links() }}

    <a class="button is-primary" href="/add">Add a ticket</a>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
@endsection

