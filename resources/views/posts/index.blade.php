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

<body style="padding: 50px">
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
        <div class="text-center">
            <a href="/posts/create" class="mt-4 btn btn-success"> Create Post</a>
        </div>
    </div>
    <div class="container">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allPosts as $post)

                <tr>
                    <td>{{$post['id']}}</td>
                    <td>{{$post['title']}}</td>
                    <td>{{$post['posted_by']}}</td>
                    <td>{{$post['created_at']}}</td>
                    <td>
                        <a href="/posts/id" class="btn btn-info">View</a>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>