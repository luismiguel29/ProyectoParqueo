<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mensaje extends Model
{
    //use HasFactory;
    protected $table = "mensaje";
    protected $primaryKey = "id";
    protected $fillable = ['Asunto','Descripcion', 'dirigido_a'];
    public $timestamps = false;

}