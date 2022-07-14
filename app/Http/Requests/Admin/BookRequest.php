<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'author_id' => 'required|integer|exists:authors,id',
            'pages' => 'required|integer',
            'published' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите название',
            'author_id.required' => 'Выберите автора',
            'author_id.exists' => 'Автора не существует',
            'pages.required' => 'Введите количество страниц',
            'published.required' => 'Введите дату публикации',
        ];
    }
}
