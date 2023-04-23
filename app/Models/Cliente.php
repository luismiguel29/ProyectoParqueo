<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    //use HasFactory;
    protected $table = "usercustom";
    protected $primaryKey = "id";
    protected $fillable = ['tipo','nombre', 'apellido','ci', 'telefono', 
    'correo','tipo_vehiculo','placa','marca','color','modelo','usuario','contraseña'];
    public $timestamps = false;

}