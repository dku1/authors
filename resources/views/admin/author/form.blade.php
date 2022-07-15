@extends('admin.layouts.master')

@isset($author)
    @section('title', 'Редактирование автора')
@else
    @section('title', 'Добавление автора')
@endisset

@section('content')

    @isset($author)
        <h4 class="text-center mt-3 mb-3">{{ $author->getInitials() }}</h4>
    @else
        <h4 class="text-center mt-3 mb-3">Добавление автора</h4>
    @endisset

<form
    @isset($author)
    action="{{ route('admin.authors.update', $author) }}"
    @else
    action="{{ route('admin.authors.store') }}"
    @endisset

    method="post">

    @isset($author)
    @method('patch')
    @endisset

    @csrf

    <label for="name" class="form-label mt-2">Имя</label>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input class="form-control" type="text" value="{{ $author->name ?? '' }}" name="name">
    <label for="name" class="form-label mt-2">Фамилия</label>
    @error('surname')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input class="form-control" type="text" value="{{ $author->surname ?? '' }}" name="surname">
    <label for="name" class="form-label mt-2">Отчество</label>
    @error('patronymic')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input class="form-control" type="text" value="{{ $author->patronymic ?? '' }}" name="patronymic">
    <label for="name" class="form-label mt-2">Страна</label>
    @error('country')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input class="form-control" type="text" value="{{ $author->country ?? '' }}" name="country">
    <label for="name" class="form-label mt-2">Дата рождения</label>
    @error('birthday')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input class="form-control" type="date" value="{{ $author->birthday ?? '' }}" name="birthday">

    <button type="submit" class="btn btn-success mt-4">Сохранить</button>
</form>
@endsection
