<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    Use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombre', 'salarioDolares', 'salarioPesos', 'direccion', 'estado', 'ciudad', 'telefono',
        'correo', 'activo'
    ];
}