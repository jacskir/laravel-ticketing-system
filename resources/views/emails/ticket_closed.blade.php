@component('mail::message')

Hello {{ $assignerName }},

This message is to inform you that {{ $assigneeName }} has closed a ticket you assigned.

Thanks,<br>
{{ config('app.name') }}

@component('mail::button', ['url' => env('APP_URL').'/ticket/'.$ticketid])
View Ticket
@endcomponent

@endcomponent