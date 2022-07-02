<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_termino',
        'pago',
        'estado',
        'rut_trabajador',

    ];
    protected $dates = [

    ];
    public function trabajador(){

        return $this->belongsTo(User::class, 'rut_trabajador');
    }
}
