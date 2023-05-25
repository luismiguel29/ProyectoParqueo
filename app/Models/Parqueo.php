<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parqueo extends Model
{
    use HasFactory;

    protected $table = 'parqueo';

    // // protected $primaryKey = ['id', 'usercustom_id'];
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'usercustom_id',
        'invitado',
        'sitio',
        'zona',
        'descripcion',
        'estado',
        'fechaasig',
    ];

    public $timestamps = false;

    public $incrementing = false;

    public function usercustom()
    {
        return $this->belongsTo('App\Models\User', 'usercustom_id');
    }

    public function invitados()
    {
        return $this->belongsTo(User::class, 'invitado');
    }
}
