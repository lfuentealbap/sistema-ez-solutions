<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_emisor',
        'direccion_emisor',
        'ciudad_emisor',
        'email_emisor',
        'telefono_emisor',
        'descripcion',
        'id_area',
    ];
}
