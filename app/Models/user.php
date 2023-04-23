<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table="usercustom";
    protected $primaryKey="id";
    protected $fillable = ['tipo', 'nombre', 'apellido', 'ci', 'telefono', 'correo', 'tipo_vehiculo','placa', 'marca', 'color', 'modelo', 'usuario', 'contraseña'];

    public $timestamps = false;
}
