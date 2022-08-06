<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionProducto extends Model
{
    protected $table = "cotizacion_producto";
    public $timestamps = false;
    protected $fillable = [
        'id_cotizacion',
        'codigo_producto',
        'cantidad',
        'subtotal',
    ];

}
