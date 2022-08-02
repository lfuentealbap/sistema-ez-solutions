<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nombre_gasto',
        'detalle',
        'monto',
        'tipo',
        'rut_trabajador',
        'fecha_gasto',

    ];
    public function trabajador(){

        return $this->belongsTo(User::class, 'rut_trabajador');
    }
}
