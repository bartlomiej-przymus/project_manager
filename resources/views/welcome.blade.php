@extends('layouts.index')
@section('content')
    <section class="hero is-info is-bold is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Project Manager App
                </h1>
                <h2 class="subtitle">
                    Let's make projects great again:)
                </h2>
                <div class="section">
                    @if (Route::has('login'))
                            @auth
                            <p>You are alrady logged in!</p>
                                <a class="button is-primary" href="{{ url('/home') }}">Back to Home</a>
                            @else
                                <p>Please Sign In to view your projects</p>
                                    <br>
                                <a class="button is-success" href="{{ route('login') }}">Login</a>
                                @if (Route::has('register'))
                                    <a class="button" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection