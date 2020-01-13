<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link href="{{ asset ('css/ticketingsystem.css') }}" rel="stylesheet" />
    <title>@yield('page_title', 'Ticketing System')</title>
</head>
<body>
    <div class="container">
        <h1 class="title">
            @yield ('page_heading', 'Ticketing System')
        </h1>
        
        @yield ('content')
    </div>
</body>
</html>