<?php

namespace App\Services\Admin;

use App\Models\Author;

class AuthorService
{
    public function destroy(Author $author): void
    {
        if ($author->books->count() == 0){
            $author->delete();
            session()->flash('warning', 'Автор удалён');
        }else{
            session()->flash('warning', 'У этого атвора есть книги!');
        }
    }
}
