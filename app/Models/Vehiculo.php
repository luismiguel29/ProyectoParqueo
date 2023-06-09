<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table="vehiculo";
    protected $primaryKey="id";
    protected $fillable = ['usercustom_id', 'tipo', 'marca', 'placa', 'modelo', 'color'];

    public function propietario()
    {
        return $this->belongsTo(User::class, 'usercustom_id');
    }

    public $timestamps = false;
}
