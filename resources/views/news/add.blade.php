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

    <form>
        <fieldset>
            <legend>Добавление новости</legend>
            <input type="text" name="title" placeholder="Название новости"><br>
            <input type="text" name="category" placeholder="Категория"><br>
            <input type="text" name="Author" placeholder="Автор"><br><br>
            <textarea name="text" id="text" placeholder="Содержание новости" cols="30" rows="10"></textarea><br>

            <p><input type="submit"></p>
        </fieldset>
    </form>

@endsection





