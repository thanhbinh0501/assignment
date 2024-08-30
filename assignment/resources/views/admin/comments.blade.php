@extends('layout')

@section('tieudetrang')
    Quản lý Bình luận
@endsection

@section('noidung')
<div class="container mt-4">
    <h1 class="mb-4">Danh sách Bình luận</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($comments->isEmpty())
        <div class="alert alert-info">
            Không có bình luận nào.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bài viết</th>
                    <th>Người dùng</th>
                    <th>Nội dung</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
    <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ $comment->article->title }}</td>
        <td>{{ $comment->user->name }}</td>
        <td>{{ $comment->content }}</td>
        <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
        <td>
            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')">Xóa</button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
