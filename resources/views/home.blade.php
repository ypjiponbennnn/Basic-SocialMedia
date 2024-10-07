<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Basic Social Media</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    </head>
    <body>
        <div class="container mt-3">
            <form method="POST" action="/newpost">
                @csrf
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter post title">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Content</label>
                    <input type="text" class="form-control" name="content" placeholder="Enter post Content">
                </div>
                <!-- <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Tag</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter tag">
                </div> -->
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Post Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Tag</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($posts->isNotEmpty())
                        @foreach ($posts as $post)
                            <tr>
                                <th>{{ $post->title }}</th>
                                <th>{{ $post->content }}</th>
                                <th>
                                    @foreach ($post->tags as $tag)
                                        {{ $tag->name }}{{ !loop->last ? ',' : ''}}
                                    @endforeach
                                </th>
                                <th><a href="/edit/{{ $post->id }}" class="btn btn-primary">Edit</a>
                                    <a href="/delete/{{ $post->id }}" class="btn btn-danger">Delete</a>
                                </th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th>No Data</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </body>
</html>