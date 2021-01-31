<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:categories|min:3|max:30'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Заполните категорию',
            'unique' => 'Категория должна быть уникальная',
            'min' => 'минимальное название категории должно быть не меньше :min',
            'max' => 'максимальное название категории должно быть не более :max'
        ];
    }
}
