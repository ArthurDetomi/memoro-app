<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap Social App - Register Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Font Awesome Link -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    />
  </head>
  <body>
    <!-- Navigation Section Starts Here -->
    <nav
      class="navbar navbar-expand-lg bg-dark sticky-top"
      data-bs-theme="dark"
    >
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="images/logo.png" alt="Social App" style="height: 36px" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="products.html"
                ><i class="fa fa-home"></i> Página Inicial</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="products.html"
                ><i class="fa fa-box"></i> Produtos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="memories.html"
                ><i class="fa fa-photo-video"></i> Memórias
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Páginas
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="register.html">Registro</a>
                </li>
                <li><a class="dropdown-item" href="login.html">Login</a></li>
                <li><hr class="dropdown-divider" /></li>
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
            <input
              class="form-control me-2"
              type="search"
              placeholder="Pesquisar"
              aria-label="Pesquisar"
            />
            <button class="btn btn-outline-warning" type="submit">
              Pesquisar
            </button>
          </form>
          <!-- Search Bar Ends  -->
        </div>
      </div>
    </nav>
    <!-- Navigation Section Ends Here -->

    <!-- Main Content Section Starts Here -->
    <section class="main-content py-5 container-fluid">
      <!--row justify-content-center is used for centering the login form-->
      <section class="row justify-content-center">
        <!--Making the form responsive-->
        <section class="col-12 col-sm-6 col-md-4">
          <form action="#" method="post" class="form-container">
            <h3 class="text-center font-weight-bolder">Register</h3>
            <div class="form-group">
              <label>Email address</label>
              <input
                type="email"
                name="email"
                class="form-control"
                aria-describedby="emailHelp"
                placeholder="Enter email"
              />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Password"
              />
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input
                type="password"
                name="confirm_password"
                class="form-control"
                placeholder="Confirm Password"
              />
            </div>
            <button type="submit" class="btn btn-dark mt-3">Register</button>
            <div class="mt-3">
              <p>
                Alerady have an account?
                <a href="login.html" class="text-decoration-none">Login</a>
              </p>
            </div>
          </form>
        </section>
      </section>
    </section>
    <!-- Main Content Section Ends Here -->

    <!-- Footer Section Starts Here -->
    @include('layout.footer')
    <!-- Footer Section Ends Here -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
