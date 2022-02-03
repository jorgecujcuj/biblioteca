<?php

namespace App\Http\Requests\Comentario;

use Illuminate\Foundation\Http\FormRequest;

class StoreComentarioRequest extends FormRequest
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
            'comentario' => ['required', 'string', 'min:10', 'max:255'],
            'nombreautor' => ['required', 'string', 'min:4','max:45'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:100'],
        ];
    }
}
