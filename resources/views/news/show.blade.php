@extends('layouts.main')
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
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
                            <strong>{{ $newsItem['title'] }}</strong>
                        </div>
                        <div class="card-title">
                            Категория: <a
                                href="{{ route('news.category', ['category' => $newsItem['category']['id']]) }}">
                                {{ $newsItem['category']['category'] }}</a>
                        </div>
                        <p class="card-text">{{ $newsItem['description'] }}</p>
                        <small class="text-muted">Автор: {{ $newsItem['author'] }}</small>
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
    </div>
@endsection
