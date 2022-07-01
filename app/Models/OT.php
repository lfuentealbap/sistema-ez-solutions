<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OT extends Model
{
    use HasFactory;
    protected $table = "ordenes_trabajos";
    protected $fillable = [
        'nombre_tecnico',
        'fecha',
        'nombre_colaborador',
        'calle',
        'ciudad',
        'tipo_requerimiento',
        'detalles_equipo',

    ];
}
