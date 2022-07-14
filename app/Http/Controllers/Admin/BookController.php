<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Admin\BookRequest;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $authors = Author::get();
        return view('admin.book.form', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request): RedirectResponse
    {
        Book::create($request->validated());
        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return Application|Factory|View
     */
    public function show(Book $book): View|Factory|Application
    {
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return Application|Factory|View
     */
    public function edit(Book $book): View|Factory|Application
    {
        $authors = Author::get();
        return view('admin.book.form', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookRequest $request
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());
        return redirect()->route('admin.books.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return RedirectResponse
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('admin.books.index');
    }
}
