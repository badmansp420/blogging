<!doctype html>
<html lang="en">

<head>
    <title>Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: #eae2b7;

        }

        nav {
            background: rgba(231, 229, 229, 0.45);
            box-shadow: 0 8px 32px 0 rgba(103, 106, 146, 0.37);
            backdrop-filter: blur(4.5px);
            -webkit-backdrop-filter: blur(4.5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>

@auth

    <body>
        <header>
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        GetYourBlog
                    </a>
                    <div class="d-flex gap-3">
                        <h6 class="navbar-brand fs-6 mt-1">
                            Name :
                            {{ auth()->user()->name }}
                        </h6>
                        <a href="/"><button class="btn btn-outline-secondary">Dashboard</button></a>
                        <a href="/logout"><button class="btn btn-outline-danger">Logout</button></a>
                    </div>
                </div>
            </nav>

        </header>
        <main>
            <section>
                <div class="container mt-5 mt-sm-2 m-auto">
                    <div class="card bg-secondary-subtle">
                        <div class="card-header">
                            <h2 class="card-title text-center">Edit Your Blog</h2>
                        </div>
                        <div class="card-body">
                            <form action="/edit-post/{{ $post->id }}" method="post" class="row g-3 p-3">
                                @csrf
                                @method('put')
                                <div class="col-12">
                                    <label for="title" class="form-label">Blog Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $post->title }}">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12">
                                    <label for="content" class="form-label">Blog content</label>
                                    <textarea class="form-control" name="content" id="editor" rows="10">{{ $post->content }}</textarea>
                                    <span class="text-danger">
                                        @error('content')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <script>
                                        ClassicEditor.create(document.querySelector('#editor')).catch(error => {
                                            console.error(error);
                                        });
                                    </script>
                                </div>
                                <div class="d-grid gap-2 col-3 mx-auto">
                                    <button type="submit" class="btn btn-success">
                                        Save changes
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    </body>
@else

    <head>
        <meta http-equiv="refresh" content="2; URL=/" />

    </head>

    <body>
        <main>
            <div class="d-flex justify-content-center">
                <h4 class="m-auto">No Data Found</h4>
            </div>
        </main>
    </body>
@endauth

</html>
