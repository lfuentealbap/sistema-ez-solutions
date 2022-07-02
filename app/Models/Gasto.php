<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_gasto',
        'detalle',
        'monto',
        'rut_trabajdor',
        'fecha_gasto',

    ];
    public function trabajador(){

        return $this->belongsTo(User::class, 'rut_trabajador');
    }
}
