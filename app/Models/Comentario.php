<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentario
 *
 * @property $idcomentario
 * @property $comentario
 * @property $nombreautor
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comentario extends Model
{
    
    static $rules = [
		'comentario' => 'required',
		'nombreautor' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'idcomentario';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['comentario','nombreautor','email'];



}
