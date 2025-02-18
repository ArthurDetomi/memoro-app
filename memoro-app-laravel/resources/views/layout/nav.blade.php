<!-- Navigation Section Starts Here -->
<nav class="navbar navbar-expand-lg bg-dark sticky-top" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="Social App" style="height: 36px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="products.html"><i class="fa fa-home"></i> Página
                        Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ Route::is('products.index') ? 'active' : '' }}" aria-current="page"
                        href={{ route('products.index') }}><i class="fa fa-box"></i>
                        Produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="memories.html"><i class="fa fa-photo-video"></i>
                        Memórias
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Páginas
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('register') }}">Registro</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-disabled="true">Contato</a>
                </li>
            </ul>

            <!-- Search Bar Starts  -->
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" />
                <button class="btn btn-outline-warning" type="submit">
                    Pesquisar
                </button>
            </form>
            <!-- Search Bar Ends  -->

            <!-- User Profile Starts  -->
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="images/user.png" alt="Username" style="height: 36px" />
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="profile.html">Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="password_change.html">Change Password</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="settings.html">Settings</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        @auth()
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
            <!-- User Profile Ends  -->
        </div>
    </div>
</nav>
<!-- Navigation Section Ends Here -->
