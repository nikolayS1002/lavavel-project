@extends('layouts.main')
@section('title')
    О нас
@endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">О нас</h1>
        </div>
    </div>
@endsection
@section('content')

    <br>

    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <div>Здесь вы можете узнать всю информацию о нашем портале</div>
            <br>
            <h5>оставьте отзыв о нашем портале:</h5>
            <div>
                <form method="post" action="{{ route('about.feedback.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control" placeholder="Ваше имя" id="name" name="name"
                               value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="text"></label>
                        <textarea class="form-control" placeholder="напишите отзыв" name="text" id="text" required>
                             {!!  old('text') !!}
                        </textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Оставить отзыв</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h5>
                Форм заказа на получение выгрузки данных из какого-либо источника.
            </h5>
            <div>
                <form method="post" action="{{ route('about.data.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Имя</label>
                        <input type="text" placeholder="Ваше имя" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" placeholder="Ваш телефон" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" placeholder="e-mail" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Данные</label>
                        <select name="status" id="status" class="form-control">
                            <option @if(old('status') === '1') selected @endif >Справка</option>
                            <option @if(old('status') === '2') selected @endif>Предложение</option>
                            <option @if(old('status') === '3') selected @endif>Обращение</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Отправить</button>
                </form>
            </div>
        </div>
    </div>



@endsection


