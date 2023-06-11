<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table="pago";
    protected $primaryKey="id";
    protected $fillable = ['tarifa_id', 'parqueo_usercustom_id', 'parqueo_id', 'fechapago', 'estado'];

    public $timestamps = false;

    public function pagoTitular()
    {
        return $this->belongsTo(User::class, 'parqueo_usercustom_id');
    }

    public function pagoSitio()
    {
        return $this->belongsTo(Parqueo::class, 'parqueo_id');
    }

    public function pagoTarifa()
    {
        return $this->belongsTo(Tarifa::class, 'tarifa_id');
    }
}
