<?php

namespace App\Http\Controllers\RegisterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacto;

class VistaContactos extends Controller
{
    public function index()
    {
        $contacto = Contacto::first();
        return view('registro.Contactos', compact('contacto'));
    }
}
