<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="body-site">
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light barra-navegação">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="logo">
            <img src="{{ asset('/img/logo.png') }}" alt="Logo">
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-site">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link navegation" href="{{ route('site.index') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navegation" href="{{ route('login') }}"><i
                                class="fas fa-sign-in-alt"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="pagina">
            @yield('content')
        </div>
    </main>
    </div>
    @stack('scripts')
</body>

</html>
