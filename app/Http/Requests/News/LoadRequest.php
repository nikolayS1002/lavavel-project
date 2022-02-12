<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class LoadRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:2', 'unique:news,title'],
            'author' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpg,png'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'required' => 'Необходимо заполнить поле :attribute.'
    //     ];
    // }

    // public function attributes()
    // {
    //     return [
    //         'title' => 'заголовок',
    //         'author' => 'автор новости',
    //     ];
    // }
}
