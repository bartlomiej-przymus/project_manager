@extends('layouts.app')

@section('content')
<h3 class="title has-text-black">Register</h3>
    <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="field">
        <div class="control">
            <label for="name" class="label">Name</label>
            <input id="name" type="text" class="input {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <p class="help is-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </p>
                @endif
        </div>
    </div>
    <div class="field">
        <div class="control">
            <label for="email" class="label">E-Mail Address</label>
            <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <p class="help is-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </p>
                @endif
        </div>
    </div>
    <div class="field">
        <div class="control">
            <label for="password" class="label">Password</label>
            <input id="password" type="password" class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <p class="help is-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </p>
                @endif
        </div>
    </div>
    <div class="field">
        <div class="control">
            <label for="password-confirm" class="label">Confirm Password</label>
            <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
        </div>
    </div>
    <div class="field">
        <div class="control has-text-centered">
            <button type="submit" class="button is-primary">
                Register
            </button>
        </div>
    </div>
    </form>
@endsection
