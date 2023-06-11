<?php

namespace App\Http\Controllers\ControlPagos;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pago;
use App\Models\ConfiguracionParqueo\CrearSitio;
use App\Models\AtencionSolicitud;
use Illuminate\Http\Request;

class VisualizarListaPagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombreBuscado = trim($request->get('nombreABuscar'));
        $pagos = Pago::select('parqueo_usercustom_id', 'parqueo_id', 'fechapago', 'nombre', 'sitio', 'pago.estado', 'pago.id')
                    ->join('usercustom', 'usercustom.id', '=', 'pago.parqueo_usercustom_id')
                    ->join('parqueo', 'parqueo.id', '=', 'pago.parqueo_id')
                    ->where('nombre', 'LIKE', '%'.$nombreBuscado.'%')
                    ->get();
        //$pagos = Pago::select('parqueo_usercustom_id', 'parqueo_id', 'fechapago')->get();
        //$pagos = Pago::select('parqueo_id', 'fechapago')->where('estado', '==', 0)->get(); ****************************
        $mesesLiteral = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $parqueo = CrearSitio::select('id', 'parqueo.usercustom_id', 'parqueo.sitio', 'parqueo.fechaasig', 'parqueo.zona')->where('usercustom_id', '!=', 0)->get();
        
        for ($i = 0; $i < count($pagos); $i++) { 
            $fecha = json_decode($pagos[$i])->fechapago;
            $mesNumero = date("n", strtotime($fecha));
            $pagos[$i]->mesLiteral = $mesesLiteral[$mesNumero-1];
            
            json_encode($pagos[$i]);
        }
        //Control de fechas
        $diaActual = date("d");
        if($diaActual == 11){
            for ($i = 0; $i < count($parqueo); $i++) {
                $fechaActual = date("Y-m-d H:i:s");
                $pagosPersona = Pago::select('fechapago')->where('parqueo_usercustom_id', $parqueo[$i]->usercustom_id)->orderBy('fechapago', 'desc')->first();
                if($pagosPersona != ""){
                    $fechaPersona = json_decode($pagosPersona)->fechapago;
                    $mesPersona = date("n", strtotime($fechaPersona));
                    $mesActual = date("n", strtotime(date("Y-m-d H:i:s")));
                    if($mesPersona != $mesActual){
                        $datosJson = $parqueo[$i];
                        $idUserPagos = json_decode($datosJson)->usercustom_id;
                        $idParqueo = json_decode($datosJson)->id;
                        
                        $pago = new Pago;
                        $pago->parqueo_usercustom_id = $idUserPagos;
                        $pago->tarifa_id = "1";
                        $pago->parqueo_id = $idParqueo;
                        $pago->fechapago = date("Y-m-d H:i:s");
                        $pago->estado = 0; //0->no pagado
                        $pago->save();
                    }
                }else{
                    $datosJson = $parqueo[$i];
                    $idUserPagos = json_decode($datosJson)->usercustom_id;
                    $idParqueo = json_decode($datosJson)->id;
                    
                    $pago = new Pago;
                    $pago->parqueo_usercustom_id = $idUserPagos;
                    $pago->tarifa_id = "1";
                    $pago->parqueo_id = $idParqueo;
                    $pago->fechapago = date("Y-m-d H:i:s");
                    $pago->estado = 0; //0->no pagado
                    $pago->save();
                }
            }
        }
        
        return view('ControlPagos.VisualizarListaPagos', compact('pagos', 'nombreBuscado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
