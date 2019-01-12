<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
        <title>Project Manager</title>
    </head>
    <body>
        <section class="hero is-bold is-info is-medium">
        <div class="container">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <p class="title">
                        Project Manager App
                    </p>
                    <p class="subtitle">
                        Let's make projects great again:)
                    </p>
                    <p>Please Sign In to view your projects</p>
                    <section class="section">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif 
                    </section>
                </div>
            </div>
        </div>
        </section>  
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    </body>
</html>
