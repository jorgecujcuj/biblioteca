<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
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
            'nombrecategoria' => ['required','unique:categorias,nombrecategoria,' . $this->route('categoria')->id,'max:35'],
            'descripcioncategoria' => ['nullable','max:120']
        ];
    }
}
