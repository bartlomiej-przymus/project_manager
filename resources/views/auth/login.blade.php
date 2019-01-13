@extends('layouts.app')

@section('content')
    <h3 class="title has-text-black">
        Login
    </h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
            <div class="control">
                <label for="email" class="label">E-Mail Address:</label>
                <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
                <input id="password" type="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <p class="help is-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </p>
                @endif
            </div>
        </div>
        <div class="field">
            <div class="control has-text-centered">
                <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="checkbox" for="remember">
                    Remember Me
                </label>
            </div>
        </div>
        <div class="field">
            <div class="control has-text-centered">
                <button type="submit" class="button is-primary">
                    Login
                </button>
                @if (Route::has('password.request'))
                    <a class="button is-white" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection
