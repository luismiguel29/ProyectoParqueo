<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table="pago";
    protected $primaryKey="id";
    protected $fillable=[
        'parqueo_usercustom_id', 'tarifa_id', 'parqueo_id', 'fechapago', 'estado'
    ];
    
    public $timestamps = false;
}
