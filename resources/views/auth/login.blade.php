<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Đăng nhập</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(120deg, #f6f9fc 0%, #e9ecef 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            padding: 2rem 0;
            display: flex;
            align-items: center;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 0;
        }

        .login-image {
            position: relative;
            height: 100%;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
        }

        .login-image img {
            max-width: 90%;
            height: auto;
            filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.2));
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        .login-form {
            padding: 3rem;
        }

        .login-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .form-control {
            padding: 0.8rem 1.2rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .login-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(102, 126, 234, 0.2);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #4a5568;
        }

        .register-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #764ba2;
        }

        .error-message {
            background-color: #fff5f5;
            color: #e53e3e;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        @media (max-width: 991.98px) {
            .login-image {
                min-height: 300px;
            }

            .login-form {
                padding: 2rem;
            }

            .login-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 767.98px) {
            .login-container {
                padding: 1rem;
            }

            .login-card {
                margin: 0 1rem;
            }

            .login-image {
                min-height: 250px;
            }

            .login-form {
                padding: 1.5rem;
            }

            .login-title {
                font-size: 1.75rem;
                margin-bottom: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="login-card">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class="login-image">
                                    <img src="{{ asset('images/login.png') }}" alt="Login illustration">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="login-form">
                                    <h1 class="login-title">Welcome Back</h1>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        
                                        @if(session('error'))
                                            <div class="error-message">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <div class="mb-4">
                                            <label class="form-label" for="uname">Username</label>
                                            <input type="text" 
                                                   id="uname" 
                                                   name="uname" 
                                                   class="form-control" 
                                                   placeholder="Enter your username"
                                                   value="{{ old('uname') }}" 
                                                   required>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" 
                                                   id="password" 
                                                   name="password" 
                                                   class="form-control" 
                                                   placeholder="Enter your password"
                                                   required>
                                        </div>

                                        <button type="submit" class="login-btn">
                                            Sign In
                                        </button>

                                        <p class="register-link">
                                            Don't have an account? 
                                            <a href="{{ route('register') }}">Create Account</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>