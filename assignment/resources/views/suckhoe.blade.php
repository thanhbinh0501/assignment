@extends('layout')

@section('tieudetrang')
    Tin Sức Khỏe
    Giới Thiệu <hr>
    Loạt sự cố hy hữu trận U23 Tây Ban Nha thắng U23 M... <hr>
    Đường hoa biển Đà Nẵng thành hình, du khách thích ... <hr>
    Dấu hiệu bệnh bạch hầu có dễ nhận biết?
@endsection

@section('noidung')
<div class="container mt-4">
    <h1 class="mb-4">Tin Sức Khỏe</h1>
    <div class="row">
        @foreach ($tinSucKhoe as $tin)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('chitiet', ['id' => $tin->id]) }}">
                    <img src="{{ asset('storage/' . $tin->image) }}" class="card-img-top" alt="{{ $tin->title }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $tin->title }}</h5>
                        <p class="card-title">{{ $tin->tomTat }}</p>
                        <p class="card-text"><small class="text-muted">Ngày đăng: {{ $tin->published_at }} - Lượt truy cập: {{ $tin->views }}</small></p>
                        <p class="card-text">{{ $tin->summary }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
