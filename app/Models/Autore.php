<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Autore
 *
 * @property $idautor
 * @property $nombreautor
 * @property $descripcionautor
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Autore extends Model
{
    
    static $rules = [
		'nombreautor' => 'required',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'idautor';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreautor','descripcionautor'];



}
