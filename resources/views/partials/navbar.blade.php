<!-- resources/views/navbar.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomePages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container nav">
            <a class="navbar-brand text-black" href="{{ route('navbar') }}" style="color: dodgerblue;">
                <img alt="logo" src="{{ asset('/images/logo_icon_whitetext.png') }}" width="60px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item mx-3">
                        <a class="nav-link active" href="#section1"><b>Cơ hội việc làm</b></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link active" href="#section2"><b>Công ty tuyển dụng</b></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link active" href="#section3"><b>Blog IT</b></a>
                    </li>
                </ul>
            </div>

            <form class="d-flex">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                    <div class="gravatar-wrapper-32 mx-2">
                        <a href="{{ route('profile') }}"><img src="{{ asset('images/avatar.jpg') }}" alt="Avatar" width="50px" class="rounded-circle"></a>
                    </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-black" style="font-size: 20px;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown">
                            {{ auth()->user()->user_name ?? 'Account' }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            @if(auth()->user() && auth()->user()->user_name != 'admin')
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Hồ sơ cá nhân</a></li>
                                <li><a class="dropdown-item" href="{{ route('statusCV') }}">Việc làm chờ duyệt</a></li>
                                <li><a class="dropdown-item" href="{{ route('statusCV', ['saved' => true]) }}">
                                    Việc đã lưu</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

    <!-- Sections -->
    <section id="section1"> <!-- Content for Cơ hội việc làm --> </section>
    <section id="section2"> <!-- Content for Công ty tuyển dụng --> </section>
    <section id="section3"> <!-- Content for Blog IT --> </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
