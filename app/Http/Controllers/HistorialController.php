<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class HistorialController extends Controller
{

    public function __construct()
     {
         $this->middleware('auth', ['except' => []]);
     }

    public function listahistorial(Request $request)
    {
        $fecha_ini = date('Y-m-d 00:00:00');
        $historial = Historial::where('fecha', ">", $fecha_ini)->get();
        return view('loginuser.historial', compact('historial'));
    }

    public function registroHistorial(Request $request)
    {
        Historial::create([
            'usuario' => session('sesion')->id,
            'fecha' => Carbon::now(),
            /* 'fechaini' => request('fechaini'),
            'fechafin' => request('fechafin'), */
        ]);
    }

    public function buscarHistorial(Request $request)
    {

        $request->validate([
            'fechaini' => 'required',
            'fechafin' => 'required',
        ],[
            'fechaini.required' => 'El campo fecha inicio es obligatorio',
            'fechafin.required' => 'El campo fecha fin es obligatorio',
        ]);
        $date1 = Carbon::parse(request('fechaini'))->format('Y-m-d 00:00:00');
        $date2 = Carbon::parse(request('fechafin'))->format('Y-m-d 23:59:59');
        $historial = Historial::whereBetween('fecha', [$date1, $date2])
        ->get();
        return view('loginuser.historial', compact('historial'));
    }
}
