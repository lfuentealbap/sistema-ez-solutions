<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey = "rut";
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'nombre_completo',
        'direccion',
        'rut',
        'ciudad',
        'telefono',
        'email',

    ];
    public function cotizaciones()
    { //relacion con id personalizada;
        return $this->hasMany(Cotizacion::class, 'rut_cliente');
    }
}
