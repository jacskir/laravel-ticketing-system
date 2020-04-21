@extends ('layouts.app')

@section ('page_title')
    Ticketing System
@endsection

@section ('page_heading')
    Ticketing System
@endsection


@section ('content')
    <nav class="level is-mobile is-marginless homepage-level">
        <div class="level-left">
            <div class="level-item">
                <div class="select">
                    <select id="ticketFilter">
                        <option>All</option>
                        <option {{ $filter === 'assigned-to-me' ? 'selected' : '' }}>Assigned to me</option>
                        <option {{ $filter === 'assigned-by-me' ? 'selected' : '' }}>Assigned by me</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <a class="button is-primary" href="/add">Add a ticket</a>
            </div>
        </div>
    </nav>

    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <th>Assigned to</th>
            <th>Ticket</th>
            <th>Status</th>
            <th>Date updated</th>
        </thead>
        <tbody>
            @foreach ($tickets as $t)
                <tr>
                    <td>{{ $t->assignee->name }}</td>
                    <td>{{ $t->ticket }}</td>
                    <td>{{ $t->status }}</td>
                    <td>{{ $t->updated_at->format('D jS M Y') }}</td>
                    <td class="shrink">
                        <div class="field is-grouped">
                            <a class="button"
                            href="/ticket/{{ $t->id }}/">
                                <span class="icon">
                                    <ion-icon name="eye"></ion-icon>
                                </span>
                            </a>
                            <a class="button"
                            href="/ticket/{{ $t->id }}/edit/"
                            @cannot ('update', $t) disabled @endcannot>
                                <span class="icon">
                                    <ion-icon name="create"></ion-icon>
                                </span>
                            </a>
                            <a class="button"
                            href="/ticket/{{ $t->id }}/delete/"
                            @cannot ('delete', $t) disabled @endcannot>
                                <span class="icon">
                                    <ion-icon name="trash"></ion-icon>
                                </span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tickets->links() }}
@endsection

