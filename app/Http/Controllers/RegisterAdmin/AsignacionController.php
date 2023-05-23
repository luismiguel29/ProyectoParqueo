<?php

namespace App\Http\Controllers\RegisterAdmin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Parqueo;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AsignacionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth',['except' => []]);
    // }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $asignaciones = DB::table('parqueo')
            ->leftJoin('usercustom', 'parqueo.usercustom_id', '=', 'usercustom.id')
            ->select('parqueo.id', 'parqueo.zona', 'parqueo.sitio', 'parqueo.estado', 'parqueo.descripcion', 'parqueo.fechaasig','parqueo.invitado', 'usercustom.nombre', 'usercustom.telefono', 'usercustom.ci', 'usercustom.rol')
            ->when($search, function ($query, $search) {
                return $query->where('usercustom.ci', 'like', '%'.$search.'%');
            })
            ->get();

        return view('registro.asignarSol', ['asignaciones' => $asignaciones]);
    }



    public function buscarPorNombre(Request $request)
    {
        $nombre = $request->get('nombre');
        $usuarios = User::where('nombre', 'LIKE', "%{$nombre}%")
                                ->where('rol', 'cliente')
                                ->get();
        return response()->json($usuarios);
    }



    public function asignarUsuario(Request $request)
    {
        $idParqueo = $request->get('idParqueo');
        $idUsuario = $request->get('idUsuario');

        $usuario = DB::table('usercustom')->find($idUsuario);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado.']);
        }

        if ($usuario->rol != 'cliente') {
            return response()->json(['message' => 'El usuario no tiene el rol adecuado.']);
        }

        // Comprobamos si el usuario ya tiene un sitio asignado
        $asignacionExistente = DB::table('parqueo')->where('usercustom_id', '=', $idUsuario)->first();
        if ($asignacionExistente) {
            return response()->json(['message' => 'Este usuario ya tiene un sitio asignado.']);
        }

        DB::table('parqueo')
            ->where('id', '=', $idParqueo)
            ->update([
                'usercustom_id' => $idUsuario,
                'fechaasig' => DB::raw('CURRENT_TIMESTAMP'),
                'estado' => 1
            ]);

        return response()->json(['message' => 'Asignación realizada con éxito.']);
    }


}
