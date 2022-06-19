<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_creacion',
        'fecha_expiracion',
        'rut_cliente',
        'neto',
        'iva',
        'total',

    ];
}
