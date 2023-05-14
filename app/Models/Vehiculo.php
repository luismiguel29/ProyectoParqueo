<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table="vehiculo";
    protected $primaryKey="idVehiculo";
    protected $fillable = ['Usuario_idUsuario', 'tipo', 'placa', 'marca', 'modelo', 'color'];

    public $timestamps = false;
}
