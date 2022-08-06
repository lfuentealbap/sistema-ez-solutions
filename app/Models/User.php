<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "trabajadores";
    protected $primaryKey = "rut";
    protected $keyType = 'string';
    protected $fillable = [
        'rut',
        'nombres',
        'apellidos',
        'rut',
        'rol',
        'direccion',
        'ciudad',
        'telefono',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cotizaciones()
    { //relacion con id personalizada;
        return $this->hasMany(Cotizacion::class, 'rut_trabajador');
    }

    public function trabajos()
    { //relacion con id personalizada;
        return $this->hasMany(Trabajo::class, 'rut_trabajador');
    }
    public function gastos()
    { //relacion con id personalizada;
        return $this->hasMany(Gasto::class, 'rut_trabajador');
    }
    public function ordenes_trabajos()
    { //relacion con id personalizada;
        return $this->hasMany(OT::class, 'rut_trabajador');
    }
}
