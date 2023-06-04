<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table="historial";
    protected $primaryKey="id";
    protected $fillable = ['usuario', 'fecha', 'fechaini', 'fechafin'];

    public $timestamps = false;

    public function usuarioNom(){
        return $this->belongsTo(User::class, 'usuario');
    }

}
