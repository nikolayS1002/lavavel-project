@extends('layouts.main')
@section('title')
    Список новостей
@endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список Новостей</h1>
        </div>
        {{--        <div><br><a href="{{ route('news.add') }}"><button>Добавить новость</button></a></div>--}}
    </div>
@endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @forelse($newsList as $news)

            <div class="col">
                <div class="card shadow-sm">
                    @if($news->image)
                        <img src="{{ Storage::disk('public')->url($news->image) }}" alt="" width="100%" height="250">
                    @else

                        <svg class="bd-placeholder-img card-img-top" width="100%" height="250"
                             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                             preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"/>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                    @endif

                    <div class="card-body">
                        <div class="card-header">
                            <strong><a
                                    href="{{ route('news.show', ['news' => $news]) }}">{{ $news->title }}</a></strong>
                        </div>
                        {{--                        <div class="card-title">--}}
                        {{--                            Категория: <a--}}
                        {{--                                href="{{ route('news.category', ['category' => $newsItem['category']['id']]) }}">--}}
                        {{--                                {{ $newsItem['category']['category'] }}</a>--}}
                        {{--                        </div>--}}
                        <p class="card-text">{{ $news->description }}</p>
                        <small class="text-muted">Автор: {{ $news->author }}</small>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Смотреть подробнее
                                </button>
                            </div>
                            <small class="text-muted">{{ $news->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h3>Новостей нет</h3>
        @endforelse
    </div>
    {{ $newsList->links() }}
@endsection
