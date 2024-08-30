<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Tùy chỉnh kích thước của Google Maps */
    .embed-responsive {
        position: relative;
        height: 0;
        overflow: hidden;
        padding-bottom: 90%; /* Tăng tỷ lệ khung hình để Google Maps lớn hơn */
    }
    .embed-responsive iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1000px;
    }

    /* Căn giữa nội dung Google Maps */
    .text-center {
        text-align: center;
    }

    /* Tùy chỉnh đường viền và padding của form liên hệ */
    .border {
        border: 1px solid #dee2e6; /* Đường viền màu xám nhạt */
    }
    .rounded {
        border-radius: 0.375rem; /* Đường viền tròn */
    }
    .p-4 {
        padding: 1.5rem; /* Padding xung quanh form */
    }
    .bg-light {
        background-color: #f8f9fa; /* Màu nền sáng */
    }

    /* Tùy chỉnh kích thước của form liên hệ */
    .form-control-lg {
        font-size: 1.25rem;
        padding: 0.75rem 1.25rem;
    }
    .btn-lg {
        padding: 0.75rem 1.25rem;
        font-size: 1.25rem;
    }

    /* Căn chỉnh các phần tử */
    .row {
        display: flex;
        flex-wrap: wrap;
    }
    .col-md-6 {
        flex: 1;
        max-width: 50%;
    }
    .col-md-12 {
        flex: 1;
        max-width: 100%;
    }

    /* Tùy chỉnh logo mạng xã hội */
    .social-icons {
        font-size: 2rem;
        display: flex;
        gap: 15px;
        justify-content: center;
    }
    .social-icons a {
        color: #333;
        text-decoration: none;
    }
    .social-icons a:hover {
        color: #007bff;
    }
  </style>
</head>
<body>
@extends('layout')

@section('noidung')
<div class="container mt-4">
    <div class="row">
        <!-- Phần Form Liên Hệ -->
        <div class="col-md-6 mb-4">
            <div class="border rounded p-4 bg-light">
                <h1>Liên Hệ</h1>
                <p>Để liên hệ với chúng tôi, vui lòng gửi email đến: contact@thanhbinhnews.com</p>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control form-control-lg" id="name" placeholder="Nhập họ và tên">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg" id="email" placeholder="Nhập email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Tin nhắn</label>
                        <textarea class="form-control form-control-lg" id="message" rows="4" placeholder="Nhập tin nhắn"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Gửi</button>
                </form>
            </div>
        </div>

        <!-- Phần Google Maps -->
        <div class="col-md-6 mb-4">
            <div class="embed-responsive">
                <!-- Thay thế URL bên dưới bằng URL của Google Maps của bạn -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d370.2088585197621!2d108.16877088848801!3d16.05201402671459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142196d9a203685%3A0x4e8027fe58d65525!2zQ2FvIMSR4bqzbmcgRlBUIEPGoSBT4bufIDI!5e0!3m2!1svi!2s!4v1723390293811!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- Địa chỉ, Số điện thoại và các logo mạng xã hội -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="border rounded p-4 bg-light text-center">
                <h4>Thông Tin Liên Hệ</h4>
                <p><strong>Địa chỉ:</strong> 116 Nguyễn Huy Tưởng, Hoà An, Liên Chiểu, Đà Nẵng 550000, Việt Nam</p>
                <p><strong>Số điện thoại:</strong> (012) 1234 5678</p>
                <div class="social-icons mt-3">
                    <a href="https://www.facebook.com" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://zalo.me" target="_blank" title="Zalo"><i class="fab fa-weixin"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
