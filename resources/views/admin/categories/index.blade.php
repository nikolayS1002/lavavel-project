@extends('layouts.admin')
@section('title')Список категорий@endsection

@section('header')
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
        </div>
    </div>
@endsection

@section('content')
            <div class="table-responsive">
                @include('inc.message')

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Кол-во новостей</th>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Опции</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->news->count() }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Ред.</a>&nbsp;
                                <a href="javascript:;" class="delete" rel="{{ $category->id }}"  style="color: red;">Уд.</a></td>
                        </tr>
                    @empty
                        <th><td colspan="6">Записей нет</td></th>
                    @endforelse
                    </tbody>
                </table>

                {{ $categories->links() }}
            </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            const el = document.querySelectorAll(".delete");
            el.forEach(function (e, k) {
                e.addEventListener('click', function () {
                    const id = e.getAttribute("rel");
                    if(confirm("Подтвердите удаление категории с #ID =" + id)){
                        send('/admin/categories/' + id).then(() => {
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
