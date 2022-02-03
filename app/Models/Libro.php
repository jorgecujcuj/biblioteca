<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Libro
 *
 * @property $id
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

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['iduser','idcategoria','idautor','imglibro','titulolibro','idiomalibro','descripcionlibro'];



}
