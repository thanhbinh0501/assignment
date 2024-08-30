@extends('admin.layout')

@section('title', 'Quản Lý Bài Viết')

@section('content')
<div class="container mt-4">
    <div class="border rounded p-4 shadow-sm bg-light">
        <h1 class="mb-4 text-center">Danh Sách Bài Viết</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-4">Thêm Bài Viết</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Danh Mục</th>
                        <th>Ngày Đăng</th>
                        <th>Hình Ảnh Chính</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($article->published_at)->format('d/m/Y') }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-thumbnail" width="100">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm me-2">Sửa</a>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
