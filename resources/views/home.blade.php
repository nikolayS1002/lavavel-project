@extends('layouts.main')
@section('title')
    Главная страница
@endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Главная страница</h1>
        </div>
    </div>
@endsection
@section('content')
    <h5><a href="{{ route('news.index') }}">Новости</h5></a><br>
    <h5><a href="{{ route('news.categories') }}">Категории новостей</a></h5><br>
    <p><a href="{{ route('news.add') }}"><button>Добавить новость</button></a></p><br>
@endsection


