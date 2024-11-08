<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $fillable = [
        'nombres', 
        'apellidos', 
        'direccion',
        'tipo_documento', 
        'numero_documento',
        'correo',
        'numero_telefono', 
        'fecha_nacimiento',
        'antecedentes',
    ];
}
