<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/241549bf03.js" crossorigin="anonymous"></script>
    <style>
        /* Custom styles for the navbar and footer */
        .navbar-brand {
            font-size: 1.5rem;
            color: #007bff !important;
        }
        .navbar-nav .nav-link {
            font-size: 1.2rem;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 1rem 0;
            text-align: center;
        }
        .container-content {
            padding: 2rem;
            margin-top: 4.5rem; /* Add space to avoid content overlap with fixed navbar */
            min-height: 60vh;
        }
        .container-content {
        padding-top: 5rem; /* Dành cho desktop */
        }

        @media (max-width: 768px) {
            .container-content {
                padding-top: 6.5rem; /* Dành cho màn hình nhỏ */
            }
        }

        
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('admin.home') }}">IT JOB _ Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="{{ route('admin.home') }}"
                            id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('images/admin.png') }}" alt="Avatar" width="30" class="rounded-circle me-2">
                            {{ session('admin_name', 'Admin') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <!-- Logout Form -->
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" class="dropdown-item" onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container container-content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light text-center">
    <div class="container">
        <span class="text-muted">
            <a href="#" class="text-decoration-none">Điều khoản</a> |
            <a href="#" class="text-decoration-none">Chính sách bảo mật</a> |
            <a href="mailto:itjob@support.com" class="text-decoration-none">Liên hệ</a>
        </span>
    </div>
</footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
