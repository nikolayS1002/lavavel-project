@extends('layouts.main')
@section('title')
    Список категорий новостей
@endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список категорий новостей</h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @forelse ($categoryNews as $news)
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                         xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                         preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>

                    <div class="card-body">
                        <div class="card-header">
                            <strong><a
                                    href="{{ route('news.show', ['id' => $news->id]) }}">{{ $news->title }}</a></strong>
                        </div>
                        <div class="card-title">

{{--                            <h5>Категория: <a href="{{ route('news.show', ['id' => $news->id]) }}">--}}
{{--                                    {{ $news->title }}</a></h5>--}}
                        </div>
                        <p class="card-text">{{ $news->description }}</p>
                        <small class="text-muted">Автор: {{ $news->author }}</small>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Смотреть подробнее
                                </button>
                            </div>
                            <small class="text-muted">{{ now('Europe/Moscow') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h3>Новостей нет</h3>
        @endforelse
        {{ $categoryNews->links() }}
    </div>
@endsection
{{--<!--<h1>Список новостей по категории --><?//=$category?><!--</h1>-->--}}
{{--<br>--}}
{{--<?php foreach($categoryNews as $newsItem): ?>--}}
{{--<div>--}}
{{--        <h5>Категория: <a href="{{ route('news.category', ['id' => $newsItem->id]) }}">--}}
{{--    {{ $newsItem->title }}</a></h5>--}}
{{--    <strong><a href="{{ route('news.show', $newsItem->id )}}">{{ $newsItem->title }}</a></strong>--}}
{{--    <p>{{ $newsItem->description }}</p>--}}
{{--    <em>Автор: {{ $newsItem->author }}</em>--}}
{{--    <hr>--}}
{{--</div>--}}
{{--<?php endforeach; ?>--}}

