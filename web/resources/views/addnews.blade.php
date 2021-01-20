
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
    <title>Registrar Noticias</title>
</head>


<body>
<!--<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/img/icon.png" alt="" width="30" height="30" class="d-inline-block align-top icon">
            News
        </a>
    </div>
</nav>-->

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
                    <a class="nav-link" href="/listnews">Lista de Noticias</a>

                </li>
            </ul>
        </div>
    </nav>
</div>


<div class="container container-form">
    <h1>Registrar Noticias</h1>

    @if($errors -> any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors-> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="#" method="POST">

        @csrf

        <div class="form-group">
            <label for="title" class="col-sm-2 ">Titulo</label>
            <div>

                <input type="text" class="form-control" name="title" placeholder="Inserte un titulo"
                >
            </div>

        </div>

        <div class="form-group">
            <label for="author" class="col-form-label">Autor</label>
            <div>

                <input type="text" class="form-control" name="author" placeholder="Inserte un autor"
                >
            </div>
        </div>

        <div class="form-group">
            <label for="source" class="col-sm-2 col-form-label">Fuente</label>
            <div>

                <input type="text" class="form-control" name="source" placeholder="Inserte la fuente de la noticia"
                >
            </div>
        </div>

        <div class="form-group">
            <label for="url" class="col-sm-2 col-form-label">URL</label>
            <div>

                <input type="text" class="form-control" name="url" placeholder="Inserte la url de la noticia ">
            </div>
        </div>

        <div class="form-group">
            <label for="urlImage" class="col-sm-2 col-form-label">URL de la Imagen</label>

            <div>

                <input type="text" class="form-control" name="urlImage" placeholder="Inserte la url de la imagen de la noticia" >
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-2 col-form-label">Descripcion</label>
            <div>

                <input type="text" class="form-control" name="description" placeholder="Inserte una descripcion de la noticia" >

            </div>
        </div>

        <div class="form-group ">
            <label for="content" class="col-sm-2 col-form-label">Contenido</label>
            <div>
                <!--<input type="text" class="form-control" name="content" placeholder="content" -->
            <textarea type="text" class="form-control" name="content" rows="4" cols="40" value="{{old('content')}}" placeholder="Inserte el contenido de la noticia"></textarea>
            </div>

        </div>

        <?php
        date_default_timezone_set('America/Santiago');
        $date_actual = date("d-m-Y H:i:s");
        ?>
        <div class="form-group">
            <label for="date" class="col-sm-2 col-form-label">Fecha de Publicacion</label>
            <div>
                <input type="text" class="form-control" name="date" type="datetime" value="<?= $date_actual?>">
            </div>
        </div>

        <div>
            <br/>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-dark">Save News</button>
            </div>
        </div>
    </form>
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
