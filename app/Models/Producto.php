<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = "codigo";
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'descripcion',
        'valor',
    ];
    //relacion muchos a muchos con cotizacion
    public function cotizaciones(){
        //hace la relacion muchos a muchos y trae el elemento de la tabla de la relacion cotizacion-producto
        return $this->belongsToMany(Cotizacion::class)->withPivot(['cantidad', 'subtotal']);
    }
}
