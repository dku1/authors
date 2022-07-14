@extends('layouts.master')

@section('title', 'Authors & books')

@section('content')
    <h4 class="text-center mt-3 mb-3">Авторы</h4>
    <div class="text-left">
        @foreach($authors as $author)
            <div class="dropdown mb-2">
                <button class="btn dropdown-toggle text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #e3f2fd;">
                    {{ $author->getInitials() }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach($author->books as $book)
                    <li><a class="dropdown-item text-dark" href="#">{{ $book->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-start paginate mt-5">
        {{ $authors->links('pagination::bootstrap-4') }}
    </div>
@endsection
