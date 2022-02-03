<?php

namespace App\Http\Requests\Autor;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutorRequest extends FormRequest
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

		    'nombreautor' => ['required','unique:autores,nombreautor','max:35'],
            'descripcionautor' => ['nullable','max:120'],

        ];
    }
}
