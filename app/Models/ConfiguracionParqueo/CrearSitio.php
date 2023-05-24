<?php

namespace App\Models\ConfiguracionParqueo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrearSitio extends Model
{
    //use HasFactory;
    protected $table= "parqueo";
    protected $primaryKey = "id";
    protected $fillable =['usercustom_id','sitio', 'zona', 'descripcion', 'estado','fechaasig'];
    public $timestamps = false;
}
