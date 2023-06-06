<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table="configuracion";
    protected $primaryKey="id";
    protected $fillable = ['nombre', 'dia', 'estado'];

    public $timestamps = false;
}
