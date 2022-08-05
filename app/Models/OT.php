<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OT extends Model
{
    use HasFactory;
    protected $table = "ordenes_trabajos";
    protected $fillable = [
        'rut_trabajador',
        'fecha',
        'nombre_colaborador',
        'direccion',
        'ciudad',
        'tipo_requerimiento',
        'detalles_equipo_antiguo',
        'detalles_equipo_nuevo',
        'descripcion_solucion',
        'id_area',
        'id_trabajo',
        'observaciones',
        'firma'

    ];
    public function trabajo(){

        return $this->belongsTo(Trabajo::class, 'id_trabajo');
    }
    public function area(){

        return $this->belongsTo(Area::class, 'id_area');
    }
    public function trabajador(){

        return $this->belongsTo(User::class, 'rut_trabajador');
    }
}
