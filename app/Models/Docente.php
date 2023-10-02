<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table="docente";
    protected $primaryKey="id";
    protected $fillable = ['nombres', 'ci', 'cargo', 'carga_horaria', 'carrera', 'facultad'];

    public $timestamps = false;
}
