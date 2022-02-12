<h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
<br>
@if(Auth::user()->is_admin == 1)
<a href="{{ route('admin.index') }}" style="color: red">Перейти в админку</a>
<br>
@endif
@if(Auth::user()->avatar)
    <img src="{{ Auth::user()->avatar }}" style="width:300px;" alt="">

@endif

<a href="{{ route('account.logout') }}">Выход</a>
