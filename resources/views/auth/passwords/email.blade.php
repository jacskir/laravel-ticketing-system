@extends('layouts.app')

@section('content')
<div class="columns is-marginless is-centered">
        <div class="column is-half">
            <div class="card">
                <div class="card-content">
                    <p class="title is-4 has-text-centered">Reset Password</p>

                    <form class="forgot-password-form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="field">
                            <label class="label">Email address</label>
                            <div class="control">
                                <input class="input" id="email" type="email" name="email" value="{{ old('email') }}"
                                        required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary is-fullwidth">Send Password Reset Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection