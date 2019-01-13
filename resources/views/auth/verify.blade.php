@extends('layouts.app')

@section('content')
<div class="column is-4 is-offset-4">
    <div class="box has-text-centered">
        <div class="title has-text-black">Verify Your Email Address</div>
            @if (session('resent'))
                <div class="content has-text-success">A fresh verification link has been sent to your email address.</div>
            @endif
        <div class="content">
            Before proceeding, please check your email for a verification link.
            If you did not receive the email, <a class="link" href="{{ route('verification.resend') }}">click here to request another</a>.
        </div>
    </div>
</div>
@endsection
