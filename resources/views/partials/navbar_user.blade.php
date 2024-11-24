<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Home Page')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Đặt script ở cuối body để tối ưu performance -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand text-black" style="color: dodgerblue;" href="{{ route('home') }}">
                <img alt="logo" src="{{ asset('images/logo_icon_whitetext.png') }}" width="60px">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item mx-3">
                        <a class="nav-link active" href="{{ route('login') }}#section1"><b>Cơ hội việc làm</b></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link active" href="{{ route('login') }}#section2"><b>Công ty tuyển dụng</b></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link active" href="{{ route('login') }}#section3"><b>Blog IT</b></a>
                    </li>
                </ul>

                <!-- User dropdown menu -->
                <div class="d-flex align-items-center">
                    <div class="nav-item dropdown d-flex align-items-center">
                        <div class="gravatar-wrapper-32 mx-2">
                            <a href="{{ route('profile') }}">
                                <img src="{{ asset('images/avatar.jpg') }}" alt="Avatar" width="50px" class="rounded-circle">
                            </a>
                        </div>
                        
                        <a class="nav-link dropdown-toggle text-black" 
                           href="#" 
                           id="navbarDropdown" 
                           role="button" 
                           data-bs-toggle="dropdown" 
                           aria-expanded="false"
                           style="font-size: 20px;">
                            {{ session('user_name', 'Account') }}
                        </a>
                        
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Hồ sơ cá nhân</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Việc làm chờ duyệt</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile', ['saved' => true]) }}">Việc đã lưu</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    
    
    

    <!-- Scripts đặt ở cuối body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>