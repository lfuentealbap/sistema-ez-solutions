<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',


    ];
    public function trabajos()
    { //relacion con id personalizada;
        return $this->hasMany(Trabajo::class, 'id_area');
    }
}
