<div class="logo">
    <img src="{{ asset('/storage/img/logo.png') }}" alt="Logo">
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-site">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <form class="navbar-toggler" action="{{ route('blog.search') }}" method="GET">
            <input class="form-control" name="search" type="search" placeholder="Buscar..." aria-label="Search">
        </form>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::is('site.index') ? 'navbar-active' : '' }}">
                <a class="nav-link navegation" href="{{ route('site.index') }}">Início</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Blog
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('blog.index') }}">Todos os posts</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('blog.category') }}">Categorias</a>
                    <a class="dropdown-item" href="{{ route('blog.date') }}">Datas</a>
                </div>
            </li>
            <li class="nav-item {{ Route::is('site.contact') ? 'navbar-active' : '' }}">
                <a class="nav-link navegation" href="{{ route('site.contact') }}">Contato</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <div class="nav-search">
                <form class="form-inline my-2 my-lg-0" action="{{ route('blog.search') }}" method="GET">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Buscar..."
                        aria-label="Search" required>
                    <button class="buttons button-registrar my-2 my-sm-0" type="submit"><i
                            class="fas fa-search"></i></button>
                </form>
            </div>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Minha Conta
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if (Auth::user() == null)
                        <a class="dropdown-item" href="{{ route('login') }}">Entrar</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Registrar</a>
                    @else
                        <div class="dropdown-user">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('perfil.users.show', Auth::user()->id) }}">
                                        <img class="img-fluid img-circle"
                                            src="{{ asset('/storage/img/user/' . Auth::user()->image) }}"
                                            alt="Foto de perfil">
                                    </a>
                                </div>
                                <div class="col=6">
                                    <div class="text-center">
                                        <a href="{{ route('perfil.users.show', Auth::user()->id) }}">
                                            <h1>{{ Auth::user()->name }}</h1>
                                        </a>
                                        <h2>{{ Auth::user()->access }}</h2>
                                        <a href="{{ route('perfil.users.show', Auth::user()->id) }}">Página de
                                            perfil</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 dropdown-select">
                                        @if (Auth::user()->access == 'Administrador')
                                            <a class="dropdown-item" href="{{ route('perfil.home') }}">Dashboard</a>
                                            <a class="dropdown-item"
                                                href="{{ route('perfil.users.index') }}">Usuários</a>
                                            <a class="dropdown-item"
                                                href="{{ route('perfil.categories.index') }}">Categorias</a>
                                        @endif
                                        @if (Auth::user()->access == 'Administrador' || Auth::user()->access == 'Autor')
                                            <a class="dropdown-item"
                                                href="{{ route('perfil.posts.index') }}">Publicações</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>
