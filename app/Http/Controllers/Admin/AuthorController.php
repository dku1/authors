<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Services\Admin\AuthorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Admin\AuthorRequest;
use Illuminate\Http\RedirectResponse;

class AuthorController extends Controller
{

    /**
     * @var AuthorService
     */
    private AuthorService $service;

    /**
     * @param AuthorService $service
     */
    public function __construct(AuthorService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $authors = Author::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.author.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorRequest $request
     * @return RedirectResponse
     */
    public function store(AuthorRequest $request): RedirectResponse
    {
        Author::create($request->validated());
        session()->flash('success', 'Автор добавлен');
        return redirect()->route('admin.authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return Application|Factory|View
     */
    public function show(Author $author): View|Factory|Application
    {
        return view('admin.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Application|Factory|View
     */
    public function edit(Author $author): View|Factory|Application
    {
        return view('admin.author.form', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorRequest $request
     * @param Author $author
     * @return RedirectResponse
     */
    public function update(AuthorRequest $request, Author $author): RedirectResponse
    {
        $author->update($request->validated());
        session()->flash('success', 'Изменения сохранены');
        return redirect()->route('admin.authors.show', $author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return RedirectResponse
     */
    public function destroy(Author $author): RedirectResponse
    {
        $this->service->destroy($author);
        return redirect()->route('admin.authors.index');
    }
}
