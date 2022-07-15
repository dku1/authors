@extends('admin.layouts.master')

@section('title', $author->getInitials())

@section('content')
    <div class="d-flex justify-content-between mt-3 mb-3">
        <h4 class="text-center mt-2">{{ $author->getInitials() }}</h4>
        <h4>
            <form action="{{ route('admin.authors.destroy', $author) }}"
                  method="post">
                @method('DELETE')
                @csrf
                <a href="{{ route('admin.authors.edit', $author) }}"
                   class="btn text-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                         fill="currentColor" class="bi bi-pencil-fill"
                         viewBox="0 0 16 16">
                        <path
                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                </a>
                <button class="btn border-0 bg-transparent text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                         fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path
                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                    </svg>
                </button>
            </form>
        </h4>
    </div>

    <table class="table table-dark table-hover text-left">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{ $author->id }}</th>
        </tr>
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">{{ $author->name }}</th>
        </tr>
        <tr>
            <th scope="col">Фамилия</th>
            <th scope="col">{{ $author->surname }}</th>
        </tr>
        <tr>
            <th scope="col">Отчество</th>
            <th scope="col">{{ $author->patronymic }}</th>
        </tr>
        <tr>
            <th scope="col">Страна</th>
            <th scope="col">{{ $author->country }}</th>
        </tr>
        <tr>
            <th scope="col">Дата рождения</th>
            <th scope="col">{{ $author->birthday }}</th>
        </tr>
        <tr>
            <th scope="col">Количество книг</th>
            <th scope="col">{{ $author->books->count() }}</th>
        </tr>
    </table>
@endsection
