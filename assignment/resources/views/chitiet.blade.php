<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .article-content img {
        display: block !important;
        margin-left: auto !important;
        margin-right: auto !important;
        max-width: 80% !important; /* Thay đổi kích thước hình ảnh để lớn hơn */
        height: auto !important; /* Đảm bảo hình ảnh không bị méo */
    }
</style>
</head>
<body>
@extends('layout')

@section('noidung')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <!-- Hiển thị nội dung bài viết với các hình ảnh -->
            <div class="article-content">
                {!! $article->content !!}
            </div>
            <p class="card-text"><small class="text-muted">Ngày đăng: {{ $article->published_at }} - Lượt truy cập: {{ $article->views }}</small></p>
        </div>
    </div>

    <!-- Bình luận -->
    <div class="mt-4">
        <h4>Bình luận</h4>
        <form action="{{ route('comments.store', ['id' => $article->id]) }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="comment" class="form-label">Thêm bình luận</label>
                <textarea id="comment" name="content" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>

        <!-- Danh sách bình luận -->
        <div class="mt-4">
            @foreach($comments as $comment)
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $comment->content }}</p>
                            <footer class="blockquote-footer">Bởi {{ $comment->user->name }} vào {{ $comment->created_at->format('d/m/Y H:i') }}</footer>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

</body>
</html>