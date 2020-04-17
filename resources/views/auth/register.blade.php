@extends('layouts.app')

@section('content')
<div class="columns is-marginless is-centered">
        <div class="column is-half">
            <div class="card">
                <div class="card-content">
                    <p class="title is-4 has-text-centered">Create an account</p>
                    <p class="subtitle is-6 has-text-centered">Or <a href="/login">sign in to your account</a></p>

                    <form class="register-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" id="name" type="name" name="name" value="{{ old('name') }}"
                                        required autofocus>
                            </div>
                            @if ($errors->has('name'))
                                <p class="help is-danger">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Email address</label>
                            <div class="control">
                                <input class="input" id="email" type="email" name="email" value="{{ old('email') }}"
                                        required>
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
                            <label class="label">Confirm password</label>
                                <div class="control">
                                    <input class="input" id="password-confirm" type="password"
                                            name="password_confirmation" required>
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary is-fullwidth">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection