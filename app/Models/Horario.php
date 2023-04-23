<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table="horario_atencion";
    protected $primaryKey="id";
    protected $fillable = ['h_apertura', 'h_cierre', 'dia'];

    public $timestamps = false;
}
