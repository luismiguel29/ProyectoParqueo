<?php

namespace App\Http\Controllers\RegisterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;

class VistaReclamoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Obtén la consulta de búsqueda del parámetro de consulta "search"
        $search = $request->query('search');

        // Crea un query builder
        $query = Solicitud::whereNotNull('tipo');

        // Si se proporcionó una consulta de búsqueda, añade una cláusula where al query
        if ($search) {
            $query->where('tipo', 'LIKE', "%{$search}%")
                ->orWhere('usuario', 'LIKE', "%{$search}%");
        }

        // Ejecuta la consulta y obtén las solicitudes
        $solicitudes = $query->get();

        // Pasa las solicitudes a la vista
        return view('registro.VerReclamo', ['solicitudes' => $solicitudes]);
    }
}
