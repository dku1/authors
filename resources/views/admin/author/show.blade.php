@extends('admin.layouts.master')

@section('title', $author->getInitials())

@section('content')
    <h4 class="text-center mt-3 mb-3">{{ $author->getInitials() }}</h4>
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
