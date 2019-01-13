@extends('layouts.app')

@section('content')
<div class="column is-4 is-offset-4">
    <div class="box has-text-centered">
        <h3 class="title has-text-black">
            Reset Password
        </h3>
        @if (session('status'))
            <p class="subtitle has-text-success">
                {{ session('status') }}
            </p>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="field">
                <div class="control">
                    <label for="email" class="label">E-Mail Address</label>
                    <input id="email" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <p class="help is-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </p>
                    @endif
                </div>
            </div>
            <div class="field">
                <div class="control has-text-centered">
                    <button type="submit" class="button is-primary">
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
