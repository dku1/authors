@extends('admin.layouts.master')

@section('title', $book->title)

@section('content')
    <h4 class="text-center mt-3 mb-3">{{ $book->title }}</h4>
    <table class="table table-dark table-hover text-left">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">{{ $book->id }}</th>
        </tr>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">{{ $book->title }}</th>
        </tr>
        <tr>
            <th scope="col">Автор</th>
            <th scope="col">{{ $book->author->getInitials() }}</th>
        </tr>
        <tr>
            <th scope="col">Кол-во страниц</th>
            <th scope="col">{{ $book->pages }}</th>
        </tr>
        <tr>
            <th scope="col">Год издания</th>
            <th scope="col">{{ $book->published }}</th>
        </tr>
    </table>
@endsection
