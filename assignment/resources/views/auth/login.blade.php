<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 500px;
            margin: auto;
            padding: 2rem;
        }

        .login-card {
            border: 1px solid #e3e6ea;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .login-card-header {
            background-color: #007bff;
            color: #ffffff;
            border-bottom: 1px solid #e3e6ea;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .login-card-footer {
            border-top: 1px solid #e3e6ea;
            padding-top: 1rem;
            text-align: center;
        }

        .login-card-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .login-card-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
@extends('layout')
@section('noidung')
<div class="login-container">
        <div class="card login-card">
            <div class="card-header login-card-header bg-primary">
                <h4 class="card-title text-center text-white">Đăng Nhập</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ghi nhớ</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                </form>
            </div>
            <div class="card-footer login-card-footer">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                @endif
                <br>
                <a href="{{ route('register') }}">Bạn chưa có tài khoản? Đăng ký</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
</body>

</html>
