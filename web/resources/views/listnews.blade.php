<html>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    <title>Tabla de Noticias</title>
</head>
<body>

<!-- NavBar -->
<div class="navBar2" id="app">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000">

        <!-- News Logo -->
        <a class="navbar-brand" href="{{ url('/')}}">
            <img src="/img/icon.png" alt="" width="30" height="30" class="d-inline-block align-top icon">
            News
        </a>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Right side of the navbar -->
            <ul class="nav navbar-nav ml-auto">

                <!-- Redirect links -->
                <li class="nav-item">
                    <a class="nav-link" href="/addnews">Registrar Noticia</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/api/news">JSON</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="container">
    <br />
    <h3 align="center">Lista de todas las Noticias</h3>
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Registro de Noticias</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                @csrf
                <table id="editable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Fuente</th>
                        <th>Url</th>
                        <th>Url de la Imagen</th>
                        <th>Descripción</th>
                        <th>Contenido</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newslist as $news)
                        <tr>
                            <td>{{ $news['title']}}</td>
                            <td>{{ $news['author']}}</td>
                            <td>{{ $news['source']}}</td>
                            <td>{{ $news['url']}}</td>
                            <td>{{ $news['urlImage']}}</td>
                            <td>{{ $news['description']}}</td>
                            <td>{{ $news['content']}}</td>
                            <td>{{ $news['date']}}</td>
                            <td>
                                <!-- Delete Button -->
                                <a href="{{ "delete/".$news['id']}}" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-xs-center">
                    <ul class="pagination justify-content-center">
                        {{$newslist->onEachSide(5)->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


<footer>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 footer-text">Desarrollo de Soluciones Móviles II-2020:
        <a style="color: #000000" href="https://www.ucn.cl/"> Universidad Católica del Norte</a>
    </div>
    <!-- Copyright -->
</footer>
