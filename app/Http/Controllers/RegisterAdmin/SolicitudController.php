<?php

namespace App\Http\Controllers\RegisterAdmin;
use Illuminate\Support\Facades\DB;
use App\Models\User;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solicitud;



class SolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        // Unimos las tablas 'solicitud' y 'usercustom' en base al 'id' del usuario
        $solicitudes = DB::table('solicitud')
            ->join('usercustom', 'solicitud.usuario', '=', 'usercustom.id')
            ->join('parqueo', 'solicitud.sitio', '=', 'parqueo.id')
            ->select('solicitud.*', 'usercustom.nombre', 'usercustom.apellido', 'parqueo.sitio')
            ->orderBy('solicitud.fecha', 'asc')
            ->get();

        // Pasamos los registros obtenidos a la vista
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
