<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Blog</title>
</head>

<body>
    <nav class="navbar navbar-expend-lg navbar-light bg-light">
        <a href="#" class="navbar-brand">ITI Blog Post</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="#" class="nav-link active">All Posts</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <form method="POST" action="/posts">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="email" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select class="form-control" name="" id="">
                    <option>Ahmed</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Create Post</button>
            </div>
        </form>
    </div>



</body>

</html>