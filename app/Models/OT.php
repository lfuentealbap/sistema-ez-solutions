<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OT extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_tecnico',
        'fecha',
        'nombre_cliente',
        'calle',
        'ciudad',
        'tipo_requerimiento',
        'detalles_equipo',

    ];
}
