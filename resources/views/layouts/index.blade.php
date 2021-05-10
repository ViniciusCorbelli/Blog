<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CodeJR | Blog</title>

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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Route::is('site*') ? 'navegation-active' : '' }}">
                        <a class="nav-link navegation" href="{{ route('site.index') }}">Início</a>
                    </li>
                    <li class="nav-item {{ Route::is('blog*') ? 'navegation-active' : '' }}">
                        <a class="nav-link navegation" href="{{ route('blog.index') }}">Blog</a>
                    </li>
                </ul>
                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                    @if (Auth::user() == null)
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link navegation navegation-left" href="{{ route('login') }}"><i
                                        class="fas fa-sign-in-alt"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navegation navegation-left" href="{{ route('register') }}"><i
                                        class="fas fa-user-plus"></i></a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link navegation navegation-left"
                                    href="{{ route('login') }}">{{ Auth::user()->name }} <i
                                        class="fas fa-sign-in-alt"></i></a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </nav>
        <div class="pagina">
            @yield('content')
        </div>
        <footer class="site-footer">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5> Redes sociais</h5>
                        <a href="https://www.instagram.com/codejr/" target="_blank"> <i class="fab fa-instagram"></i> </a>
                        <a href="https://www.facebook.com/codeempresajunior/" target="_blank"> <i class="fab fa-facebook-square"></i> </a>
                    </div>

                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5>Entre em Contato</h5>
                        <p>+55 38 9944-7013<br>
                        contato@codejr.com.br<br>
                        Rua José Lourenço Kelmer, UFJF,<br>
                        Instituto de Ciências Exatas, sala 3313</p>
                    </div>
                </div>
            </div>
            <div class="p-3 container">
                <p>Copyright © 2021 Code Júnior</p>
            </div>
            <!-- Copyright -->
        </footer>
    </main>
    </div>
    @stack('scripts')
</body>

</html>
