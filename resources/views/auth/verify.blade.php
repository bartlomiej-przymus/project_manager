@extends('layouts.app')

@section('content')
<div class="subtitle">Verify Your Email Address</div>
    @if (session('resent'))
        <div class="content">A fresh verification link has been sent to your email address.</div>
    @endif
</div>
<div class="content">
    Before proceeding, please check your email for a verification link.
    If you did not receive the email, <a class="link" href="{{ route('verification.resend') }}">click here to request another</a>.
</div>
@endsection
