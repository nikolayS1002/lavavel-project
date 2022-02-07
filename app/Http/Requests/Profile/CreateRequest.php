<?php

namespace App\Http\Requests\Profile;

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
    public function rules()
    {
        return [
            'email' => ['required'],
            'name' => ['required', 'string'],
            'is_admin' => [0, 1],
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
            'name' => 'имя',
            'is_admin' => 'статус',
        ];
    }
}
