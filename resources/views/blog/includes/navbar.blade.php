<div class="logo">
    <img src="{{ asset('/img/logo.png') }}" alt="Logo">
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-site">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::is('site.index') ? 'navegation-active' : '' }}">
                <a class="nav-link navegation" href="{{ route('site.index') }}">Início</a>
            </li>
            <li class="nav-item {{ Route::is('blog*') ? 'navegation-active' : '' }}">
                <a class="nav-link navegation" href="{{ route('blog.index') }}">Blog</a>
            </li>
            <li class="nav-item {{ Route::is('site.contact') ? 'navegation-active' : '' }}">
                <a class="nav-link navegation" href="{{ route('site.contact') }}">Contato</a>
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
