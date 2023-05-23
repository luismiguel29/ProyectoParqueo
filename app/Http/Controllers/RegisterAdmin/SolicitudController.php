<?php

namespace App\Http\Controllers\RegisterAdmin;
use \DB;
use App\Models\User;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solicitud;



class SolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => []]);
    }

    public function index()
    {
        // Utiliza el modelo Solicitud para obtener todos los registros de la tabla solicitud
        $solicitudes = Solicitud::orderBy('fecha', 'asc')->get();

        // Pasa los registros obtenidos a la vista
        return view('registro.solicitudes', ['solicitudes' => $solicitudes]);
    }

    public function destroy($id)
    {
        // Utiliza el modelo Solicitud para encontrar un registro por su id y eliminarlo
        $solicitud = Solicitud::find($id);

        if ($solicitud) {
            $solicitud->delete();
        }

        // Redireccionar a la página anterior con un mensaje de éxito.
        return redirect()->back()->with('success', 'Solicitud eliminada correctamente');
    }

}
