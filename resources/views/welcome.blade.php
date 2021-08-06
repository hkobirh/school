<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') || Advanced Soft It</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('theme/backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Categories</a>
                    </li>
                    @if(Auth::user())
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit()">Logout</a>
                            </form>
                        </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.login_form')}}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
@yield('main-content')
</body>
</html>












