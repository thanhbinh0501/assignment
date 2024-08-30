<!-- resources/views/search/form.blade.php -->

@extends('layout')

@section('content')
<div class="container">
    <h1>Tìm kiếm bài viết</h1>
    <form action="{{ route('search') }}" method="GET">
        <div class="form-group">
            <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa tìm kiếm..." required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Tìm kiếm</button>
    </form>
</div>
@endsection
