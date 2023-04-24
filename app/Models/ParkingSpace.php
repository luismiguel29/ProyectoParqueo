<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model
{
    protected $table="parqueo";
    protected $primaryKey="id";
    protected $fillable=[
        'sitio', 'zona', 'descripcion', 'estado'
    ];

    public $timestamps = false;
}
