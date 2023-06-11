<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table="tarifa";
    protected $primaryKey="id";
    protected $fillable=[
        'nombre', 'precio', 'estado'];

    public $timestamps = false;
}
