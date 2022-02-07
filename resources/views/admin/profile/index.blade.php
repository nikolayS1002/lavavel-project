@extends('layouts.admin')
@section('title')Список пользователей@endsection

@section('header')
    <h1 class="h2">Список пользователей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection

@section('content')

    <div class="table-responsive">
        @include('inc.message')

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>e-mail</th>
                <th>Статус</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td><a href="{{ route('admin.profile.edit', ['user' => $user->id]) }}">Ред.</a>
                        &nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="color: red;">Уд.</a></td>
                </tr>
            @empty
                <th><td colspan="6">Записей нет</td></th>
            @endforelse
            </tbody>
        </table>

        {{ $users->links() }}
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            const el = document.querySelectorAll(".delete");
            el.forEach(function (e, k) {
                e.addEventListener('click', function () {
                    const id = e.getAttribute("rel");
                    if(confirm("Подтвердите удаление записи с #ID =" + id)){
                        send('/admin/news/' + id).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
