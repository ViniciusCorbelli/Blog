<aside class="main-sidebar elevation-4 sidebar-dark-primary" style="overflow-x: hidden;">
    <!-- Brand Logo -->
    <a class="brand-link">
        <span class="brand-text">Gerenciamento do Blog</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="{{ route('admin.users.show', Auth::user()->id) }}">
                    <img src="{{ asset('img/' . Auth::user()->image) }}"
                        class="img-circle elevation-2 perfil-sidebar">
                </a>
            </div>
            <div class="info">
                <a href="{{ route('admin.users.show', Auth::user()->id) }}"
                    class="d-block">{{ Auth::user()->name }}</a>
            </div>
            <div class="info align-self-center">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="userStatus">
                <i class="fa fa-circle text-success"></i>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{ route('site.index') }}" class="nav-link navegation">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Página inicial
                        </p>
                    </a>
                </li>
                @if (Auth::user()->access == 'Administrador')
                    <li class="nav-item has-treeview ">
                        <a href="{{ route('admin.home') }}"
                            class="nav-link navegation {{ Route::is('admin.home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link navegation {{ Route::is('admin.users*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Usuários
                            </p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->access != 'Leitor')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.posts.index') }}"
                            class="nav-link navegation {{ Route::is('admin.posts*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope-square"></i>
                            <p>
                                Publicações
                            </p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->access == 'Administrador')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.categories.index') }}"
                            class="nav-link navegation {{ Route::is('admin.categories*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-font"></i>
                            <p>
                                Categorias
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
