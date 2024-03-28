<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <style>
        :root {
            --smoky-black-1: #141204;
            --darb-dark-brown-2: #262A10;
            --darb-dark-brown-3: #54442B;
            --brown-sugar-4: #A9714B;
            --brown-orange-5: #E8985E;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: #eae2b7;

        }

        header {
            position: sticky;
            top: 0;
            z-index: 3;
        }

        nav {
            /* background: rgba(231, 229, 229, 0.45);
            box-shadow: 0 8px 32px 0 rgba(103, 106, 146, 0.37);
            backdrop-filter: blur(4.5px);
            -webkit-backdrop-filter: blur(4.5px);*/
            border-radius: 0 0 10px 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            /* From https://css.glass */
            background: rgba(255, 255, 255, 0.61);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(11.2px);
            -webkit-backdrop-filter: blur(11.2px);
        }

        .main-hero {
            /* background-image: url("assets/images/bg.png");
            background-position: center; */
            position: relative;
        }

        .hero-section {
            height: 100dvh;
            width: 100%;
            /* position: absolute; */
            margin-top: -3.5rem;
        }

        .hero-section img {
            height: 100dvh;
            width: 100%;
            object-fit: cover;
            object-position: center;
        }

        main .hero-section .login-card {
            position: absolute;
            z-index: 2;
            top: 24%;
            right: 10%;
            /* left: 50%;
            top: 50%; */
            /* transform: translate(-50%, -50%); */
            height: auto;
            width: 400px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.6px);
            -webkit-backdrop-filter: blur(6.6px);
            border: 1px solid rgba(255, 255, 255, 0.26);
        }

        .blogs {
            margin-top: 20px;
        }

        .blogs .container .card {
            /* display: flex;
            justify-content: center;
            align-items: center; */
            width: auto;
            /* height: 22rem; */
            box-shadow: 2px 2px 6px gray;
        }

        .blogs .container .card .card-body {
            justify-content: start;
            width: auto;
            /* box-shadow: 2px 2px 6px gray; */
        }

        .blogs .container .card img {
            /* height: 10rem; */
            /* width: 100%; */
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
            /* border: 2px solid rgb(204, 204, 204); */
        }

        .blogs .container .card .card-body .card-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 10;
            /* number of lines to show */
            line-clamp: 10;
            -webkit-box-orient: vertical;
        }

        .section-header {
            color: #778da9;
            text-align: center;
            padding: 10px
                /* position: relative; */
        }

        .section-header::before {
            content: '';
            /* height: 2px; */
            /* width: 25%; */
            /* background: #8e8e8e; */
            /* position: absolute; */
            /* margin-top: 46px; */
            /* margin-left: -17.5rem; */
            /* border-radius: 10px; */
            /* display: flex; */
            /* justify-content: end; */
            /* align-items: baseline; */
        }

        main section.your-blogs {
            background: url("assets/images/bg.png") repeat;
            /* opacity: 1; */
        }



        main section.your-blogs .card-body {
            /* height: 10rem; */
            /* max-height: 10rem; */
            overflow-y: auto;
        }

        .card-body p {
            text-align: justify;
            padding: 4px
        }

        .modal .modal-dialog .modal-content {
            background: rgba(255, 255, 255, 0.36);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(7.4px);
            -webkit-backdrop-filter: blur(7.4px);
            border: 1px solid rgba(255, 255, 255, 0.95);
        }
    </style>
</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="/">
                    GetYourBlog
                </a>
                <div class="d-flex gap-3">
                    @auth
                        <h6 class="navbar-brand fs-6 mt-1">
                            {{-- User Name --}}
                            Name: {{ auth()->user()->name }}

                        </h6>
                        <a href="/"><button class="btn btn-outline-secondary">Dashboard</button></a>
                        <a href="/logout"><button class="btn btn-outline-danger">Logout</button></a>
                    @else
                        <button class="btn btn-outline-success" type="button" data-bs-target="#registerModal"
                            data-bs-toggle="modal">Register</button>
                        <button class="btn btn-outline-primary" type="button" data-bs-target="#loginModal"
                            data-bs-toggle="modal">Login</button>
                    @endauth
                </div>
            </div>
        </nav>

    </header>
    {{-- start auth --}}
    @auth
        {{-- if user login --}}
        <main class="mt-5">
            <div class="container">
                <div class="card bg-secondary-subtle">
                    <div class="card-header">
                        <h2 class="card-title text-center">Create Your Blog</h2>
                    </div>
                    <div class="card-body">
                        <form action="/create-post" method="post" class="row g-3 p-3">
                            @csrf
                            <div class="col-12 ">
                                <label for="title" class="form-label">Blog Title</label>
                                <input type="text" class="form-control" id="title"
                                    placeholder="Enter Your Blog Title" name="title" value="{{ old('title') }}">
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12">
                                <label for="content" class="form-label">Blog content</label>
                                <textarea class="form-control " name="content" id="editor" placeholder="Enter Your Blog Content...">{{ old('content') }}</textarea>
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
                                <button type="reset" class="btn btn-outline-danger">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Create Your Post
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <section class="your-blogs m-3">
                <div class="container gap-2">
                    <h2 class="section-header bg-secondary bg-gradient rounded text-white">Your Posts</h2>

                    <div class="row d-flex justify-content-center">
                        @foreach ($posts as $post)
                            <div class="col-sm-10">
                                <div class="card text-bg-light mb-3 ">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post['title'] }}

                                        </h5>
                                        <p class="card-text text-justify">
                                            {!! $post['content'] !!}
                                        </p>
                                        <h6 class="card-text-footer text-end">
                                            - Posted By {{ $data = $post->user->name }}
                                        </h6>
                                    </div>
                                    <div class="card-footer d-block gap-2 text-center">
                                        {{-- <div class="d-flex gap-2"> --}}
                                        <a href="/edit-post/{{ $post->id }}" class="btn btn-primary">Edit</a>
                                        <a href="/delete-post/{{ $post->id }}" class="btn btn-danger">Delete</a>
                                        {{-- </div> --}}

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>

        {{-- else user not login --}}
    @else
        {{-- if user not login --}}
        <main class="main-hero">
            <section class="hero-section">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/2040/1080?random=1?blur=5" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/2040/1080?random=2?blur=5" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/2040/1080?random=3?blur=5" alt="...">
                        </div>
                        {{-- For Form Login --}}
                        {{-- <div class="row justify-content-end">
                            <div class="col-4">
                                <div class="card login-card">
                                    <div class="card-body">
                                        <form action="/login" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    name="loginEmail" aria-describedby="emailHelp">
                                                <span class="text-danger">
                                                    @error('loginEmail')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1"
                                                    name="loginPassword">
                                                <span class="text-danger">
                                                    @error('loginPassword')
                                                        {{ $message }}
                                                    @enderror
                                                </span>

                                            </div>
                                            <div class="d-grid">
                                                <button class="btn btn-success">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
            <section class="blogs">
                <div class="container p-2">
                    <h2 class="section-header text-center p-5">
                        Top Most Blogs
                    </h2>
                    {{-- <div class="row d-sm-flex  justify-content-start"> --}}
                    @foreach ($posts as $post)
                        {{-- <div class="col-lg-6 mb-2">
                                <div class="card">
                                    <img src="https://picsum.photos/200/300/?random=1" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ $post->content }}</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div> --}}
                        <div class="card mb-3 justify-content-start bg-dark-subtle">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <img src="https://picsum.photos/800/700/?random={{ $post }}"
                                        class="img-fluid rounded-start" alt="Image">
                                </div>
                                <div class="col-md-8 ">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{!! $post->content !!}
                                        </p>
                                        <p class="card-text fw-bolder text-end"><small class="text-body-secondary">-Posted
                                                By {{ ' ' . $post->user->name }}</small></p>

                                        <p class="card-text fw-bolder text-end"><small
                                                class="text-body-secondary">{{ $post->created_at }}</small>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card mb-3 justify-content-start">
                            <div class="row g-2">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post ->title }}</h5>
                                        <p class="card-text">{{ $post->content }}
                                        </p>
                                        <p class="card-text"><small class="text-body-secondary">- Posted By
                                                {{ $post->user->name }}</small></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="https://picsum.photos/800/700/?random={{ $post }}"
                                        class="img-fluid rounded-start" alt="Image">
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                    {{-- </div> --}}

                </div>
            </section>

        </main>
    @endauth
    {{-- end auth --}}
    <footer>
        <!-- place footer here -->
    </footer>

    {{-- Modal --}}
    <!-- Button trigger modal -->
    <!-- Modal For User Register -->
    {{-- <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="registerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="registerLabel">Registe Here</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                aria-describedby="emailHelp">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success">Register</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- End Modal for user Register --}}
    <!-- Modal For User Register -->
    <div class="modal fade" id="loginModal" aria-labelledby="loginLable" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="loginLable">Login Here</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="loginEmail"
                                aria-describedby="emailHelp">
                            <span class="text-danger">
                                @error('loginEmail')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                name="loginPassword">
                            <span class="text-danger">
                                @error('loginPassword')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- End Modal for user Register --}}
    {{-- End Modals --}}
    <!-- Bootstrap JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</body>

</html>
