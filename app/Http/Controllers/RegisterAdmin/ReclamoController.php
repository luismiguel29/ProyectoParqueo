<?php

namespace App\Http\Controllers\RegisterAdmin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;

class ReclamoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('registro.reclamo');
    }

    public function store(Request $request)
    {
        // Validaciones
        $request->validate([
            'descripcion' => 'required',
        ], [
            'descripcion.required' => 'El campo descripción es obligatorio.',
        ]);

        // Comprobar si el usuario está asignado a un sitio
        $usuarioId = auth()->user()->id; // obtén el ID del usuario autenticado
        $asignacionExistente = DB::table('parqueo')->where('usercustom_id', '=', $usuarioId)->first();

        if (!$asignacionExistente) {
            // Si el usuario no está asignado a ningún sitio, redirige con un mensaje de error
            return back()->with('error', 'No tiene asignado ningún sitio');
        }

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
