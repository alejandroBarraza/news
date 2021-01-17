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
<!-- Si el usuario no está logueado -->

@guest
    <div class="container element2">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-secondary">

                    <div class="card-header text-center">
                        <strong>Ingreso al sistema "The News"</strong>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="col-md-9 mx-auto">
                                    <div class="input-group">

                                        <input id="email" type="email" placeholder="Correo Electrónico" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <br>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <div class="col-md-9 mx-auto">
                                        <input id="password" placeholder="Contraseña" type="password" class="form-control " name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Recuérdame') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center">

                                    <button type="submit" class="btn btn-dark">
                                        Ingresar
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvidó su contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest

<footer>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 footer-text">Desarrollo de Soluciones Moviles II-2020:
        <a style="color: #000000" href="https://www.ucn.cl/"> Universidad Católica del Norte</a>
    </div>
    <!-- Copyright -->
</footer>



</body>

</html>

<script src="{{ asset('js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
