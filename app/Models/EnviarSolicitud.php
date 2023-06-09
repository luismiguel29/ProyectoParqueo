<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnviarSolicitud extends Model
{
    protected $table="solicitud";
    protected $primaryKey="id";
    protected $fillable=[
        'usuario','sitio','descripcion','fecha'];

    public $timestamps = false;
}

