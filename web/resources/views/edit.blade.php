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
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    <title>Tabla News</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/img/icon.png" alt="" width="30" height="30" class="d-inline-block align-top icon">
            News
        </a>
    </div>
</nav>

</body>

<div class="container container-form">
    <h1>Edit News</h1>
<form action="/edit" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}">
    <input type="text" name="title" value="{{$data['title']}}"> <br> <br>
    <input type="text" name="author" value="{{$data['author']}}"> <br> <br>
    <input type="text" name="source" value="{{$data['source']}}"> <br> <br>
    <input type="text" name="url" value="{{$data['url']}}"> <br> <br>
    <input type="text" name="urlImage" value="{{$data['urlImage']}}"> <br> <br>
    <input type="text" name="description" value="{{$data['description']}}"> <br> <br>
    <!--<textarea id ="content" class="form-control"name="content" placeholder="Ingresar el contenido de la noticia" rows="6" cols="50">{{$data->content}}
    </textarea>-->
    <div class="form-group ">
        <label for="content" class="col-sm-6 col-form-label">Contenido de la noticia</label>
        <div>
                    <textarea id ="content" class="form-control"name="content" rows="6" cols="50">{{$data->content}}
                    </textarea>
        </div>
    </div>
    <input type="text" name="date" value="{{$data['date']}}"> <br> <br>
    <button type="submit" class="btn btn-dark">Update</button>
</form>
</div>

<footer>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 footer-text">Desarrollo de Soluciones Moviles II-2020:
        <a style="color: #000000" href="https://www.ucn.cl/"> Universidad Católica del Norte</a>
    </div>
    <!-- Copyright -->
</footer>
