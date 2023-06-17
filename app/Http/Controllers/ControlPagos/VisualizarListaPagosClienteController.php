<?php

namespace App\Http\Controllers\ControlPagos;

use App\Http\Controllers\Controller;
use App\Models\VisualizarListaPagos;
use App\Models\User;
use App\Models\Pago;
use App\Models\ConfiguracionParqueo\CrearSitio;
use App\Models\AtencionSolicitud;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VisualizarListaPagosClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        /*$parqueoUserId =  CrearSitio::query()->select(['usercustom_id'])->get();
        $nombres = array();
        foreach ($parqueoUserId as $id) { 
            $id = json_decode($id)->usercustom_id;
            $user = User::query()->select('nombre')->where('id', $id)->get();
            if($id > 0){
                array_push($nombres, $user[0]);
            }
        }
        
        $horarios = CrearSitio::select('parqueo.usercustom_id','parqueo.sitio','parqueo.fechaasig')->where('usercustom_id', '!=', 0)->get();
        for ($i=0; $i<count($horarios); $i++) { 
            $horarios[$i]->nombre = json_decode($nombres[$i])->nombre;
            json_encode($horarios[$i]);
        }*/
        
        //return User::where('id')->first()->nombre;
        //return User::where('id','1')->first()->nombre;
        //return User::select('nombre')->where('id', '1')->get();
        
        /************************/
        $tarifas= AtencionSolicitud::select('tarifa.precio')->where('tarifa.estado', '=', 1)->first('tarifa.precio');
        $tarifasPago = json_decode($tarifas)->precio;
        $idUsuario = session()->get('sesion')->id;
        $pagos = Pago::select('parqueo_usercustom_id', 'parqueo_id', 'fechapago', 'nombre', 'sitio', 'pago.estado','pago.id')
            ->where('parqueo_usercustom_id', $idUsuario)
            ->join('usercustom', 'usercustom.id', '=', 'pago.parqueo_usercustom_id')
            ->join('parqueo', 'parqueo.id', '=', 'pago.parqueo_id')
            ->where('pago.estado', '!=', '1')
            ->get();
            
        $aux = Pago::select('parqueo_usercustom_id', 'parqueo_id', 'fechapago', 'nombre', 'sitio', 'pago.estado','pago.id')
            ->where('parqueo_usercustom_id', $idUsuario)
            ->join('usercustom', 'usercustom.id', '=', 'pago.parqueo_usercustom_id')
            ->join('parqueo', 'parqueo.id', '=', 'pago.parqueo_id')
            ->where('pago.estado', '=', '1')->orderBy('pago.id', 'DESC')->take(5)
            ->get();
            
        $pagos = $pagos->concat($aux);
            
        $mesesLiteral = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        for ($i = 0; $i < count($pagos); $i++) {
            $fecha = json_decode($pagos[$i])->fechapago;
            $mesNumero = date("n", strtotime($fecha));
            $pagos[$i]->mesLiteral = $mesesLiteral[$mesNumero - 1];
            $pagos[$i]->monto = $tarifasPago;
            json_encode($pagos[$i]);
        }
        
        return view('ControlPagos.VisualizarListaPagosCliente', compact('pagos'));
    }

    public function comprobante($id){ //***************************/
        $pago = Pago::where('id', $id)->first();
        $pdf = Pdf::setPaper([0.0, 0.0, 400.53, 700.28],'landscape')->loadView('informe.comprobante', compact('pago'));
        //return $pdf->stream();
        return $pdf->download('comprobantee.pdf');
    }

    public $buscar;
    public function buscador()
    {
        $buscar = '%' . $this->buscar . '%';
        return AtencionSolicitud::where('tarifa', 'like', $buscar)->get();
    }
}
