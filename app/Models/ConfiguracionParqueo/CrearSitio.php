<?php

namespace App\Models\ConfiguracionParqueo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrearSitio extends Model
{
    //use HasFactory;
    protected $table= "espacios_parqueo";
    protected $primaryKey = "id";
    protected $fillable =['numero_espacio', 'estado', 'observacion'];
    public $timestamps = false;
}
