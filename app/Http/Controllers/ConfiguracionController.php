<?php

namespace App\Http\Controllers;

use App\Models\AtencionSolicitud;
use App\Models\Configuracion;
use App\Models\Pago;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function verConfiguracion()
    {
        $configuracion = Configuracion::all();
        $enUsoConf = Configuracion::where('id', 1)->first();
        $enUsoTarifa = AtencionSolicitud::where('estado', 1)->first();
        $tarifa = AtencionSolicitud::all();
        return view('configuracion.vistaConf', compact('tarifa', 'enUsoTarifa', 'configuracion', 'enUsoConf'));
    }

    public function modificarConfiguracion(Request $request)
    {
        AtencionSolicitud::where('id', request('enUsoTarifa'))
        ->update([
            'estado' => 0,
        ]);

        AtencionSolicitud::where('id', request('tarifa'))
        ->update([
            'estado' => 1,
        ]);

        Configuracion::where('id', request('enUsoConf'))
        ->update([
            'estado' => 0,
        ]);

        Configuracion::where('id', request('fecha'))
        ->update([
            'estado' => 1,
        ]);
        return redirect()->route('verConfiguracion')->with('success', '¡Cambios guardados correctamente!');
    }

    public function vistaPago($id)
    {
        $pago = Pago::where('id', $id)->first();
        return view('ControlPagos.vistaPago', compact('pago'));
    }
}
