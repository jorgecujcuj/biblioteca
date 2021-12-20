<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Libro
 *
 * @property $idlibro
 * @property $iduser
 * @property $idcategoria
 * @property $idautor
 * @property $titulolibro
 * @property $idiomalibro
 * @property $descripcionlibro
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Libro extends Model
{
    
    static $rules = [
		'iduser' => 'required',
		'idcategoria' => 'required',
		'idautor' => 'required',
    'imglibro' => 'required|image|max:2048',
    'titulolibro' => 'nullable|file|mimes:pdf',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'idlibro';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['iduser','idcategoria','idautor','imglibro','titulolibro','idiomalibro','descripcionlibro'];



}
