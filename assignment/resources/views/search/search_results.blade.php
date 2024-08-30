<!-- resources/views/search/search_results.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <h1>Kết quả tìm kiếm cho "{{ $keyword }}"</h1>
        @if($results->isEmpty())
            <p>Không tìm thấy kết quả nào.</p>
        @else
            @foreach($results as $article)
                <div class="article">
                    <h2><a href="{{ route('chitiet', $article->id) }}">{{ $article->title }}</a></h2>
                    <p>{{ Str::limit($article->content, 150) }}</p>
                </div>
            @endforeach
        @endif
    </div>
@endsection
