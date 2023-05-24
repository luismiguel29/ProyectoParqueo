<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table="registro";
    protected $primaryKey="id";
    protected $fillable = ['vehiculo_usercustom_id', 'vehiculo_id', 'sitio', 'placa', 'ingreso', 'salida', 'estado'];

    public $timestamps = false;

    public function propietario()
    {
        return $this->belongsTo(User::class, 'vehiculo_usercustom_id');
    }

}
