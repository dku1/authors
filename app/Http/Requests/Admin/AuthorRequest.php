<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required|string',
            'surname' => 'required|string',
            'patronymic' => 'required|string',
            'country' => 'required|string',
            'birthday' => 'required|string|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите имя',
            'surname.required' => 'Введите фамилию',
            'patronymic.required' => 'Введите отчество',
            'country.required' => 'Введите страну',
            'birthday.required' => 'Введите дату рождения',
        ];
    }
}
