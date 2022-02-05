<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3'],
            'description' => ['nullable', 'string', 'max:300'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Необходимо заполнить поле :attribute.'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'заголовок',
            'description' => 'описание',
        ];
    }
}
