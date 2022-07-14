@extends('admin.layouts.master')

@isset($book)
    @section('title', 'Редактирование книги')
@else
    @section('title', 'Добавление книги')
@endisset

@section('content')

    @isset($book)
        <h4 class="text-center mt-3 mb-3">Редактирование - {{ $book->title }}</h4>
    @else
        <h4 class="text-center mt-3 mb-3">Добавление книги</h4>
    @endisset

    <form
        @isset($book)
        action="{{ route('admin.books.update', $book) }}"
        @else
        action="{{ route('admin.books.store') }}"
        @endisset

        method="post">

        @isset($book)
            @method('patch')
        @endisset

        @csrf
        <label for="name" class="form-label mt-2">Название</label>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" value="{{ $book->title ?? '' }}" name="title">
        <label for="name" class="form-label mt-2">Автор</label>
        @error('surname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select class="form-select" name="author_id" aria-label="Default select example">
            @foreach($authors as $author)
                <option value="{{ $author->id }}"
                        @if(isset($book->author) and $book->author->id == $author->id) selected @endif>{{ $author->getInitials() }}</option>
            @endforeach
        </select>
        <label for="name" class="form-label mt-2">Страниц</label>
        @error('pages')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" value="{{ $book->pages ?? '' }}" name="pages">
        <label for="name" class="form-label mt-2">Год публикации</label>
        @error('published')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" value="{{ $book->published ?? '' }}" name="published">

        <button type="submit" class="btn btn-success mt-4">Сохранить</button>
    </form>
@endsection
