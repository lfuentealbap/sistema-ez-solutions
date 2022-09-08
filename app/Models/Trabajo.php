<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'titulo',
        'descripcion',
        'ciudad',
        'direccion',
        'fecha_inicio',
        'fecha_termino',
        'pago',
        'estado',
        'rut_trabajador',
        'id_area',

    ];
    protected $dates = [

    ];
    public function trabajador(){

        return $this->belongsTo(User::class, 'rut_trabajador');
    }
    public function area(){

        return $this->belongsTo(Area::class, 'id_area');
    }
    public function ordenes_trabajos()
    { //relacion con orden_trabajo;
        return $this->hasOne(OT::class, 'id_trabajo');
    }
}
