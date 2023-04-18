<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model
{
    protected $table="espacios_parqueo";
    protected $primaryKey="id";
    protected $fillable=[
        'numero_espacio', 'estado'
    ];
}
