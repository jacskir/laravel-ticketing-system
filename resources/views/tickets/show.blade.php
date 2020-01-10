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