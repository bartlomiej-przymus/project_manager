<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Project Manager App</title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <section class="hero is-info is-bold is-fullheight">
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                          <a class="navbar-item" href="{{ url('/') }}">
                              Project Manager App
                          </a>
                        <span class="navbar-burger burger" data-target="navbarMenuHeroB">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navbarMenuHeroB" class="navbar-menu">
                        <div class="navbar-end">
                            @guest
                                <a class="navbar-item is-active" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a class="navbar-item" href="{{ route('register') }}">Register</a>
                            @endif
                            @else
                                <a class="navbar-item" href="#">
                                    {{ Auth::user()->name }}
                                </a>
                                <a class="navbar-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="hero-body">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</body>
</html>
