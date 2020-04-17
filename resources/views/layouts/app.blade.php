<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset ('images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link href="{{ asset ('css/ticketingsystem.css') }}" rel="stylesheet" />
    <title>@yield('page_title', 'Ticketing System')</title>
</head>
<body>
    <nav class="navbar has-shadow is-spaced">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item title"href="/">Ticketing System</a>
            </div>
            <div class="navbar-menu">
                <div class="navbar-end">
                    @auth
                        <div class="navbar-item">
                            Logged in as: {{ auth()->user()->name }}
                        </div>
                        <div class="navbar-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="button is-light" type="submit">Logout</button>
                            </form>
                        </div>
                    @endauth
                    
                </div>
            </div>
        </div>


    </nav>

    <div class="container">
        @yield ('content')
    </div>

    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>