<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $table = "cotizaciones";
    protected $fillable = [
        'fecha_creacion',
        'fecha_expiracion',
        'estado',
        'neto',
        'iva',
        'total',
        'rut_cliente',

    ];


    public function productos(){

        return $this->belongsToMany(Producto::class, 'codigo')->withPivot('cantidad', 'subtotal');
    }
    public function cliente(){

        return $this->belongsTo(Cliente::class, 'rut_cliente');
    }
}
