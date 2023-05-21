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
    protected $fillable = ['rol_id', 'nombre', 'apellido', 'ci', 'telefono', 'correo', 'usuario', 'contrasenia'];

    public $timestamps = false;
}
