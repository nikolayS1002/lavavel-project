@extends('layouts.admin')
@section('title')Редактировать запись@endsection

@section('header')
    <h1 class="h2">Редактировать запись</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>
    </div>
@endsection

@section('content')
    <div>
        @include('inc.message')
        <form method="post" action="{{ route('admin.profile.update', ['user' => $user]) }}">
            @csrf
            <input type="text" class="form-control" id="password" name="password" value="{{ $user->password }}">
{{--            @method('put')--}}
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                @error('name') <strong style="color: red">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="name">e-mail</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                @error('email') <strong style="color: red">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="author">Статус</label>
                <input type="text" class="form-control" id="is_admin" name="is_admin" value="{{ $user->is_admin }}">
                @error('is_admin') <strong style="color: red">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection
