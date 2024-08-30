<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThanhBinhNews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .container > header { height: 220px;}
        .container > nav { height: 60px;}
        .container > footer { height: 90px;}
        .container > main { display: flex; min-height: 500px;}
    </style>
</head>
<body>
    <div class="container">
        <header class="bg-primary">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="/img/news.jpg" alt="Los Angeles" class="d-block" style="height: 220px; width: 1430px">
  </div>
  <div class="carousel-item">
    <img src="/img/news1.jpg" alt="Chicago" class="d-block" style="height: 220px; width: 1430px">
  </div>
  <div class="carousel-item">
    <img src="/img/news3.jpg" alt="New York" class="d-block" style="height: 220px; width: 1430px">
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>

        </header>
        <nav class="bg-warning">
            @include('menu')
        </nav>
        <main>
            <article class="col-12 bg-light">
                @yield('noidung')
            </article>
            <!-- <aside class="col-3 bg-info">
                @yield('tieudetrang')
            </aside> -->
        </main>
        <footer class="bg-dark text-white text-center py-3">PHÁT TRIỂN BỞI CU BÌNH</footer>
    </div>
</body>
</html>
