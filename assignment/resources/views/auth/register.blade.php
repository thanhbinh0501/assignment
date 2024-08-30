<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .register-container {
            max-width: 500px;
            margin: auto;
            padding: 2rem;
        }

        .register-card {
            border: 1px solid #e3e6ea;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .register-card-header {
            background-color: #007bff;
            color: #ffffff;
            border-bottom: 1px solid #e3e6ea;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .register-card-footer {
            border-top: 1px solid #e3e6ea;
            padding-top: 1rem;
            text-align: center;
        }

        .register-card-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .register-card-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
@extends('layout')
@section('noidung')
    <div class="register-container">
        <div class="card register-card">
            <div class="card-header register-card-header bg-primary">
                <h4 class="card-title text-center text-white">Đăng Ký</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                        <input id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a class="text-decoration-none" href="{{ route('login') }}">
                        Bạn đã có tài khoản?
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Đăng Ký
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer register-card-footer">
                <a href="{{ route('login') }}">Sẵn sàng để đăng nhập?</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</body>

</html>
