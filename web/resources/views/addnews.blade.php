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
    <title>Add News</title>
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


    <div class="container container-form">
        <h1>Create a new news</h1>
        <form action="#" method="POST">

            @csrf

            <div class="form-group">
                <label for="title" class="col-sm-2 ">Title</label>
                <div>

                    <input type="text" class="form-control" name="title" placeholder="Title"
                           >
                </div>

            </div>

            <div class="form-group">
                <label for="author" class="col-form-label">Author</label>
                <div>

                    <input type="text" class="form-control" name="author" placeholder="Author"
                           >
                </div>
            </div>

            <div class="form-group">
                <label for="source" class="col-sm-2 col-form-label">Source</label>
                <div>

                    <input type="text" class="form-control" name="source" placeholder="Source"
                           >
                </div>
            </div>

            <div class="form-group">
                <label for="url" class="col-sm-2 col-form-label">URL</label>
                <div>

                    <input type="text" class="form-control" name="url" placeholder="url of the news">
                </div>
            </div>

            <div class="form-group">
                <label for="url_image" class="col-sm-2 col-form-label">URL Image</label>

                <div>

                    <input type="text" class="form-control" name="url_image" placeholder="url of the image" >
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div>

                    <input type="text" class="form-control" name="description" placeholder="description of the news" >

                </div>
            </div>

            <div class="form-group ">
                <label for="content" class="col-sm-2 col-form-label">Content</label>
                <div>
                    <textarea class="form-control" name="content" rows="4" cols="40"></textarea>
                </div>

            </div>

            <?php
            date_default_timezone_set('America/Santiago');
            $date_actual = date("d-m-Y");
            ?>
            <div class="form-group">
                <label for="date" class="col-sm-2 col-form-label">Published</label>
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
</body>
</html>
