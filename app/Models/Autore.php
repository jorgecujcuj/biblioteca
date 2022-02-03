<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Autore
 *
 * @property $id
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
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreautor','descripcionautor'];



}
