<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 *
 * @property $idcategoria
 * @property $nombrecategoria
 * @property $descripcioncategoria
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoria extends Model
{
    
    static $rules = [
		'nombrecategoria' => 'required',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'idcategoria';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrecategoria','descripcioncategoria'];



}
