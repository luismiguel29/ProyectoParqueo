<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionParqueo\CrearSitio;
use App\Models\EnviarSolicitud;
use Carbon\Carbon;
use Illuminate\Http\Request;


class VerParqueoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datos = CrearSitio::all();
        $datosA = CrearSitio::where('zona', 'A')->get();
        $datosB = CrearSitio::where('zona', 'B')->get();
        //return $datosA;
        return view('/ConfiguracionParqueo/VerParqueo', compact('datosA')); 
    }

    public function guardarSolicitud(Request $request, $idParqueo)
    {
        $request->validate([
            'descripcion' => 'required'
        ]);
        
        $enviar = new EnviarSolicitud; //tabla solicitud
        $sitio = new CrearSitio; //tabla parqueo
        $enviar->usuario = session()->get('sesion')->id;
        $enviar->sitio = $idParqueo;
        $enviar->descripcion = $request->input('descripcion');
        $enviar->fecha = now();
        $enviar->save();
        return redirect()->route('verparqueo.index')->with('success', 'Solicitud enviada!');
    }
}
