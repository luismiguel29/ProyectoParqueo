<?php
namespace App\Http\Controllers\Reportes;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf; //***************************/

class ReportesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    } 
    public function index(Request $request)
    {
        $reportes = DB::select(DB::raw("SELECT U.nombre, U.apellido, P.fechaasig, P.sitio, ( SELECT SUM(TF.precio) FROM tarifa TF, pago PG WHERE TF.id = PG.tarifa_id AND PG.estado = 1 AND PG.parqueo_id = P.id ) AS total_pagado, ( SELECT SUM(T.precio) FROM tarifa T, pago PA WHERE T.id = PA.tarifa_id AND PA.estado = 0 AND PA.parqueo_id = P.id ) AS total_pendiente, COUNT(V.placa) AS cantidad_vehiculos, SUM(R.salida - R.ingreso) AS tiempo_uso, CASE WHEN ( SELECT SUM(TA.precio) FROM tarifa TA, pago PAG WHERE TA.id = PAG.tarifa_id AND PAG.estado = 0 AND PAG.parqueo_id = P.id ) > 0 THEN 'Pendiente' ELSE 'Pagado' END AS Estado_Pago FROM parqueo P, usercustom U, vehiculo V LEFT JOIN registro R ON R.vehiculo_id = V.id WHERE P.usercustom_id = U.id AND V.usercustom_id = U.id GROUP BY P.sitio, P.zona;"));
        return view('Reportes.reportesIngreso', compact('reportes')); 
    }
    public function listareportes(Request $request)
    {
        $fecha_ini = date('Y-m-d 00:00:00');
        $fechas = Reporte::where('fecha', ">", $fecha_ini)->get();
        return view('Reportes.reportesIngreso', compact('reportes'));
    }

    public function buscarFechas(Request $request)
    {
       
        $request->validate([
            'fechaini' => 'required',
            'fechafin' => 'required',
        ],[
            'fechaini.required' => 'El campo fecha inicial es obligatorio',
            'fechafin.required' => 'El campo fecha final es obligatorio',
        ]);
        $fecha_ini = Carbon::parse(request('fechaini'))->format('Y-m-d 00:00:00');
        $fecha_fin= Carbon::parse(request('fechafin'))->format('Y-m-d 23:59:59');
        $reportes = DB::select(DB::raw("SELECT U.nombre, U.apellido, P.fechaasig, P.sitio, ( SELECT SUM(TF.precio) FROM tarifa TF, pago PG WHERE (PG.fechapago BETWEEN '{$fecha_ini}' AND '{$fecha_fin}') AND TF.id = PG.tarifa_id AND PG.estado = 1 AND PG.parqueo_id = P.id ) AS total_pagado, ( SELECT SUM(T.precio) FROM tarifa T, pago PA WHERE (PA.fechapago BETWEEN '{$fecha_ini}' AND '{$fecha_fin}') AND T.id = PA.tarifa_id AND PA.estado = 0 AND PA.parqueo_id = P.id ) AS total_pendiente, COUNT(V.placa) AS cantidad_vehiculos, SUM(R.salida - R.ingreso) AS tiempo_uso, CASE WHEN ( SELECT SUM(TA.precio) FROM tarifa TA, pago PAG WHERE (PAG.fechapago BETWEEN '{$fecha_ini}' AND '{$fecha_fin}') AND TA.id = PAG.tarifa_id AND PAG.estado = 0 AND PAG.parqueo_id = P.id ) > 0 THEN 'Pendiente' ELSE 'Pagado' END AS Estado_Pago FROM parqueo P, usercustom U, vehiculo V LEFT JOIN registro R ON R.vehiculo_id = V.id WHERE  P.usercustom_id = U.id AND V.usercustom_id = U.id GROUP BY P.sitio, P.zona;"));
        return view('Reportes.reportesIngreso', compact('reportes'));
    }

    public function reporte(){ //***************************/
        $reportes = DB::select(DB::raw("SELECT U.nombre, U.apellido, P.fechaasig, P.sitio, ( SELECT SUM(TF.precio) FROM tarifa TF, pago PG WHERE TF.id = PG.tarifa_id AND PG.estado = 1 AND PG.parqueo_id = P.id ) AS total_pagado, ( SELECT SUM(T.precio) FROM tarifa T, pago PA WHERE T.id = PA.tarifa_id AND PA.estado = 0 AND PA.parqueo_id = P.id ) AS total_pendiente, COUNT(V.placa) AS cantidad_vehiculos, SUM(R.salida - R.ingreso) AS tiempo_uso, CASE WHEN ( SELECT SUM(TA.precio) FROM tarifa TA, pago PAG WHERE TA.id = PAG.tarifa_id AND PAG.estado = 0 AND PAG.parqueo_id = P.id ) > 0 THEN 'Pendiente' ELSE 'Pagado' END AS Estado_Pago FROM parqueo P, usercustom U, vehiculo V LEFT JOIN registro R ON R.vehiculo_id = V.id WHERE P.usercustom_id = U.id AND V.usercustom_id = U.id GROUP BY P.sitio, P.zona;"));
        $pdf = Pdf::setPaper('a4','landscape')->loadView('informe.reporte', compact('reportes'));
        return $pdf->stream();
        //return $pdf->download('reportee.pdf');
    }
}