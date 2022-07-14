<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'surname', 'patronymic', 'country', 'birthday'];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function getInitials(): string
    {
        return $this->surname . ' ' . mb_substr($this->name, 0, 1)  . '. ' . mb_substr($this->patronymic,0,1);
    }
}
