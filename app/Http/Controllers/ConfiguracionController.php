<?php

namespace App\Http\Controllers;

use App\Mail\AdjuntarCorreo;
use App\Models\Pago;
use App\Models\User;
use App\Models\Mensaje;
use App\Mail\EnviarCorreo;
use Illuminate\Http\Request;
use App\Models\Configuracion;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AtencionSolicitud;
use Illuminate\Support\Facades\Mail;

class ConfiguracionController extends Controller
{

    public function __construct()
     {
         $this->middleware('auth', ['except' => []]);
     }

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
        $pdf = Pdf::setPaper([0.0, 0.0, 400.53, 700.28], 'landscape')->loadView('informe.comprobante', compact('pago'));
        //$pdf->download('comprobantee.pdf');

        Pago::where('id', $id)
            ->update([
                'estado' => 1,
                'cancelado' => now(),
            ]);
        if (session()->get('sesion')->rol == 'cliente') {
            return redirect()->route('visualizarPagosCliente.index');
        } else {

            /* $correo = User::where('id', $pago->parqueo_usercustom_id)->first();
            $mensaje = Mensaje::where('asunto', 'like', "%comprobante%")->first();         
            Mail::to($correo->correo)->send(new AdjuntarCorreo($mensaje, $pdf)); */

            return redirect()->route('visualizarPagos.index')->with('message', 'Pago realizado correctamente!');
        }
    }

    public function aleatorioUser(){
        $listaAleatoria = User::select('nombre', 'ci', 'apellido')->inRandomOrder()->take(5)->get();
        return $listaAleatoria;
    }
}
