<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table="usercustom";
    protected $primaryKey="id";
    protected $fillable = ['tipo', 'nombre', 'apellido', 'ci', 'telefono', 'correo', 'tipo_vehiculo','placa', 'marca', 'color', 'modelo', 'usuario', 'contraseña'];

    public $timestamps = false;
}
