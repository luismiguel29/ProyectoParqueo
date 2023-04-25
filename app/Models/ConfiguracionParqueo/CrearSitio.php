<?php

namespace App\Models\ConfiguracionParqueo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrearSitio extends Model
{
    //use HasFactory;
    protected $table= "parqueo";
    protected $primaryKey = "id";
    protected $fillable =['sitio', 'zona', 'observacion', 'estado'];
    public $timestamps = false;
}
