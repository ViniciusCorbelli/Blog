<div class="logo">
    <img src="{{ asset('/img/logo.png') }}" alt="Logo">
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-site">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::is('site.index') ? 'navegation-active' : '' }}">
                <a class="nav-link navegation" href="{{ route('site.index') }}">Início</a>
            </li>
            <li class="nav-item dropdown {{ Route::is('blog*') ? 'navegation-active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Blog
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item {{ Route::is('blog.index') ? 'navegation-active' : '' }}" href="{{ route('blog.index') }}">Todos os posts</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item {{ Route::is('blog.category*') ? 'navegation-active' : '' }}" href="{{ route('blog.category') }}">Categorias</a>
                    <a class="dropdown-item {{ Route::is('blog.date*') ? 'navegation-active' : '' }}" href="{{ route('blog.date') }}">Datas</a>
                </div>
            </li>
            <li class="nav-item {{ Route::is('site.contact') ? 'navegation-active' : '' }}">
                <a class="nav-link navegation" href="{{ route('site.contact') }}">Contato</a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" action="{{ route('blog.search') }}" method="GET">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Buscar..." aria-label="Search" required>
            <button class="buttons button-registrar my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>

        @if (Auth::user() == null)
            <ul class="navbar-nav">
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link navegation navegation-left"
                        href="{{ route('login') }}">{{ Auth::user()->name }} <i
                            class="fas fa-sign-in-alt"></i></a>
                </li>
            </ul>
        @endif

    </div>
</nav>
