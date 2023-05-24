<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitud'; // Define the table name

    protected $fillable = [
        'usuario',
        'sitio',
        'descripcion',
        'fecha',
    ];

    // Si tu base de datos no usa el timestamp de Laravel, añade lo siguiente:
    public $timestamps = false;
}
