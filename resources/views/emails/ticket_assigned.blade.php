@component('mail::message')

Hello {{ $assigneeName }},

This message is to inform you that {{ $assignerName }} has assigned a ticket to you.

Thanks,<br>
{{ config('app.name') }}

@component('mail::button', ['url' => env('APP_URL').'/ticket/'.$ticketid])
View Ticket
@endcomponent

@endcomponent