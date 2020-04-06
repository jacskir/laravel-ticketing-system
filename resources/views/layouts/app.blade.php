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
    <nav class="navbar has-shadow is-spaced">
        <div class="container">
            <div class="navbar-brand">
                <h1 class="navbar-item title">
                    @yield ('page_heading', 'Ticketing System')
                </h1>
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
                    @else
                    <div class="navbar-item">
                        <div class="buttons">
                            <a href="/register" class="button is-primary">
                                <strong>Sign up</strong>
                            </a>
                            <a href="/login" class="button is-light">
                                Log in
                            </a>
                        </div>
                    </div>

                    @endauth
                    
                </div>
            </div>
        </div>


    </nav>

    <div class="container">
        @yield ('content')
    </div>
</body>
</html>