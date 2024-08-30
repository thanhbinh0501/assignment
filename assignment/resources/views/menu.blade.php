<?php
// use Illuminate\Support\Facades\DB;
//     $loaitin_arr = DB::table('loaitin')->select('id', 'ten')
//     ->orderBy('thuTu','asc')
//     ->where('anHien','=','1')
//     ->limit(5)->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">ThanhBinhNews</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('tin.bongda') }}">Bóng Đá</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('tin.dulich') }}">Du Lịch</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('tin.suckhoe') }}">Sức Khoẻ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">Liên Hệ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('intro') }}">Giới Thiệu</a>
        </li>
      </ul>
      <form action="{{ route('search') }}" method="GET" class="d-flex">
        <input class="form-control me-2" type="text" name="search" placeholder="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      @guest
        <li><a class="nav-link" href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
        <li><a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
      @endguest
      @auth
      <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-link nav-link">Đăng xuất</button>
            </form>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
</body>
</html>