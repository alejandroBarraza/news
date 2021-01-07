<h1>Add News</h1>
<form action="" method="POST" >
    @csrf
    <input type="text" name="title" placeholder="Enter the Title"> <br> <br>
    <input type="text" name="source" placeholder="Enter the Source"> <br> <br>
    <input type="text" name="author" placeholder="Enter the Author"> <br> <br>
    <input type="text" name="url" placeholder="Enter the url"> <br> <br>
    <input type="text" name="urlImage" placeholder="Enter url of the image"> <br> <br>
    <input type="text" name="description" placeholder="Enter the description"> <br> <br>
    <input type="text" name="content" placeholder="Enter the content"> <br> <br>
    <input type="text" name="publishedAt" placeholder="Enter where was published"> <br> <br>
    <button type="submit" >Add News</button>
</form>
