<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtencionSolicitud extends Model
{
    protected $table="tarifa";
    protected $primaryKey="id";
    protected $fillable=[
        'nombre', 'precio'];

    public $timestamps = false;
}
