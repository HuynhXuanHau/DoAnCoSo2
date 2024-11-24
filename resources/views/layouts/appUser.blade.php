<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/241549bf03.js" crossorigin="anonymous"></script>
    <style>
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
            min-height: 60vh;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        @include('partials.navbar_user')
    </nav>

    <div class="container container-content">
        @yield('content')
    </div>

    <footer class="footer">
        @include('partials.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
