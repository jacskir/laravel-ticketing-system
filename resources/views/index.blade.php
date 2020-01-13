<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <link href="{{ asset ('css/ticketingsystem.css') }}" rel="stylesheet" />
    <title>Ticketing System</title>
</head>
<body>
    <table class="table is-striped is-hoverable">
        <thead>
            <th>Assigned to</th>
            <th>Ticket</th>
            <th>Status</th>
            <th>Date</th>
        </thead>
        <tbody>
            @foreach ($tickets as $t)
                <tr>
                    <td>{{ $t -> name }}</td>
                    <td>{{ $t -> ticket }}</td>
                    <td>{{ $t -> status }}</td>
                    <td>{{ $t -> created_at->format('D jS F') }}</td>
                    <td>
                        <a class="button" href="/ticket/{{ $t -> id }}/">
                            <ion-icon name="eye"></ion-icon>
                        </a>
                        <a class="button" href="/ticket/{{ $t -> id }}/edit/">
                            <ion-icon name="create"></ion-icon>
                        </a>
                        <a class="button" href="/ticket/{{ $t -> id }}/delete/">
                            <ion-icon name="trash"></ion-icon>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tickets -> links () }}

    <a class="button" href="/add">Add a ticket</a>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>