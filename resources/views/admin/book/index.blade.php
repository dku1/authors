@extends('admin.layouts.master')

@section('title', 'Книги')

@section('content')
    <h4 class="text-center mt-3 mb-3">Список книг</h4>
    <table class="table table-dark table-hover text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Автор</th>
            <th scope="col">Действия</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td class="align-middle">{{ $book->id }}</td>
            <td class="align-middle"><a href="{{ route('admin.books.show', $book) }}" class="text-decoration-none text-white">{{ $book->title }}</a></td>
            <td class="align-middle"><a href="{{ route('admin.authors.show', $book->author) }}" class="text-decoration-none text-white">{{ $book->author->getInitials() }}</a></td>
            <td class="align-middle">
                <form action="{{ route('admin.books.destroy', $book) }}"
                      method="post">
                    @method('DELETE')
                    @csrf
                    <a href="{{ route('admin.books.show', $book) }}"
                       class="btn text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </a>
                    <a href="{{ route('admin.books.edit', $book) }}"
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
            </td>
        </tr>
        @endforeach
    </table>
    <div class="mb-2">
        <a href="{{ route('admin.books.create') }}" class="btn btn-success">Добавить</a>
    </div>
    <div class="d-flex justify-content-center paginate">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>
@endsection
