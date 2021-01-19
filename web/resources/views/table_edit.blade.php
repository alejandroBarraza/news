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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Source</th>
                        <th>url</th>
                        <th>urlImage</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row -> id }}</td>
                            <td>{{ $row -> title }}</td>
                            <td>{{ $row -> author }}</td>
                            <td>{{ $row -> source }}</td>
                            <td>{{ $row -> url }}</td>
                            <td>{{ $row -> urlImage }}</td>
                            <td>{{ $row -> description }}</td>
                            <td>{{ $row -> content }}</td>
                            <td>{{ $row -> date }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){

        $.ajaxSetup({
            headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dataType:"json",
            columns:{
                identifier:[0, 'id'],
                editable:[[1, 'title'], [2, 'author'], [3, 'source'], [4, 'url'], [5, 'urlImage'], [6, 'description'], [7, 'content'], [8, 'date']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
            }
        });

    });
</script>

<footer>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 footer-text">Desarrollo de Soluciones Moviles II-2020:
        <a style="color: #000000" href="https://www.ucn.cl/"> Universidad Católica del Norte</a>
    </div>
    <!-- Copyright -->
</footer>
