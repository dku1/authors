<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $authors = Author::paginate(15);
        return view('index', compact('authors'));
    }
}
