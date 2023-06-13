<?php

namespace App\Http\Controllers\ConfiguracionParqueo;

use App\Models\ConfiguracionParqueo\CrearSitio;
use App\Models\EnviarSolicitud;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PSpell\Config;

class CrearSitioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        $datos = CrearSitio::all();
        return view('/ConfiguracionParqueo/Crear', compact('datos')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nroespacio' => ['required'],
        ],[
            'nroespacio.required', 'El campo Nro de espacio es obligatorio'
        ]);
        
        $crear = new CrearSitio;
        $crear->usercustom_id= 0;
        $crear->sitio=$request->input('nroespacio');
        $crear->zona=$request->input('zona');
        $crear->descripcion=$request->input('observacion');
        // $crear->estado=$request->input('estado');
        $crear->save();
        return redirect()->route('sites.index')->with('success', '¡Registro exitoso!');
    }
}
