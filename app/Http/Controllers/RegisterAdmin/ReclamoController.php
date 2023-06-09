<?php

namespace App\Http\Controllers\RegisterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;

class ReclamoController extends Controller
{
    public function index()
    {
        return view('registro.reclamo');
    }

    public function store(Request $request)
    {
        $solicitud = new Solicitud;

        // Si un usuario está autenticado, se usará su nombre; si no, se usará 'Guest'
        $solicitud->usuario = auth()->user() ? auth()->user()->nombre : 'Guest';

        $solicitud->sitio = $request->input('sitio'); // Asegúrate de tener este campo en tu formulario
        $solicitud->descripcion = $request->input('descripcion');
        $solicitud->fecha = now(); // Se asume que la fecha se genera automáticamente
        $solicitud->tipo = $request->input('tipo_mensaje');

        $solicitud->save();

        // Redirige al usuario a la misma vista con un mensaje de éxito
        return back()->with('success', 'Reclamo registrado exitosamente');
    }


}
