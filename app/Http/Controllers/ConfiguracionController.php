<?php

namespace App\Http\Controllers;

use App\Models\AtencionSolicitud;
use App\Models\Configuracion;
use App\Models\Pago;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ConfiguracionController extends Controller
{
    public function verConfiguracion()
    {
        $configuracion = Configuracion::all();
        $enUsoConf = Configuracion::where('estado', 1)->first();
        $tarifa = AtencionSolicitud::all();
        $enUsoTarifa = AtencionSolicitud::where('estado', 1)->first();        
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

    public function realizarPago($id)
    {
        $pago = Pago::where('id', $id)->first();
        $pdf = Pdf::setPaper([0.0, 0.0, 400.53, 700.28],'landscape')->loadView('informe.comprobante', compact('pago'));
        $pdf->download('comprobantee.pdf');
        
        Pago::where('id', $id)
        ->update([
            'estado'=> 1,
        ]);
        if (session()->get('sesion')->rol == 'cliente') {
            return redirect()->route('visualizarPagosCliente.index');
        } else {
            return redirect()->route('visualizarPagos.index');
        }
        
    }
}
