@extends('layouts.app')

@section('content')
    <div class="columns is-marginless is-centered">
        <div class="column is-half">
            <div class="card">
                <div class="card-content">
                    <p class="title is-4 has-text-centered">Sign in to your account</p>
                    <p class="subtitle is-6 has-text-centered">Or <a href="/register">create an account</a></p>

                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="field">
                            <label class="label">Email address</label>
                            <div class="control">
                                <input class="input" id="email" type="email" name="email"
                                        value="{{ old('email') }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Password</label>
                                <div class="control">
                                    <input class="input" id="password" type="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                        </div>

                        <div class="field">
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox"
                                            name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                                <a class="is-pulled-right" href="/password/reset">
                                    Forgot password?
                                </a>
                            </div>

                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary is-fullwidth">Sign in</button>
                            </div>
                        </div>
                    </form>

                    <hr class="login-hr">

                    <p class="has-text-centered has-text-grey">- Or -</p>

                    <a class="button is-fullwidth" href="/login/github">
                        <span class="icon">
                            <ion-icon name="logo-github"></ion-icon>
                        </span>
                        <span>Sign in with Github</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection