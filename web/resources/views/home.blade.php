<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Bienvenido a "The News"</title>
</head>


<!--<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/img/icon.png" alt="" width="30" height="30" class="d-inline-block align-top icon">
            News
        </a>
    </div>

</nav>

<body>-->

<!-- NavBar -->
<div class="navBar2" id="app">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000">
        <!-- Logo News -->
        <a class="navbar-brand" href="{{ url('/')}}">
            <img src="/img/icon.png" alt="" width="30" height="30" class="d-inline-block align-top icon">
            News
        </a>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Lado derecho de la barra de navegación -->
            <ul class="nav navbar-nav ml-auto">
                <!-- Links de autenticación -->

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register <span class="sr-only"></span></a>
                </li>

                @guest

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only"></span></a>
                    </li>

                    <!-- Si el usuario es un administrador... -->
                    @if(Auth::user()->rol === 'Administrador' )
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">Administrar usuarios<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">Administrar usuarios<span class="sr-only">(current)</span></a>
                        </li>
                @endif

                <!-- CERRAR SESIÓN -->
                    <div class="dropdown">
                        <button style="color: rgba(255,255,255,.75)" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- El botón activa el formulario que permite el logout -->
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Salir
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
            @endguest

        </div>
    </nav>
</div>
@auth

@endauth

<!-- home -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-dark">Ir a "Register News"</button>
                    </div>
                </div>

                <button href="{{ route('home') }}" type="button" class="btn btn-dark">Home</button>

                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-dark">Listado de Noticias</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

<footer>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 footer-text">Desarrollo de Soluciones Moviles II-2020:
        <a style="color: #000000" href="https://www.ucn.cl/"> Universidad Católica del Norte</a>
    </div>
    <!-- Copyright -->
</footer>

</body>
</html>
