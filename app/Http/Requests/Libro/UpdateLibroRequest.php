<?php

namespace App\Http\Requests\Libro;

use Illuminate\Foundation\Http\FormRequest;

class updateLibroRequest extends FormRequest
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
            'iduser' => ['required'],
            'idcategoria' => ['required'],
            'idautor' => ['required'],
            'imglibro' => ['image','mimes:jpeg,png,jpg,gif','max:2048','unique:libros,imglibro'],
            'titulolibro' => ['file','mimes:pdf','unique:libros,titulolibro'],
            'idiomalibro' => ['nullable','max:24'],
            'descripcionlibro' => ['nullable','max:120'],
        ];
    }
}
