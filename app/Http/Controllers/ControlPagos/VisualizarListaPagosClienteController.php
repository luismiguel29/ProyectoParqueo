<?php

namespace App\Http\Controllers\ControlPagos;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pago;
use App\Models\ConfiguracionParqueo\CrearSitio;
use App\Models\AtencionSolicitud;
use Illuminate\Http\Request;

class VisualizarListaPagosClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //CrearSitio == tabla PARQUEO
        $parqueoUserId = Pago::select('parqueo_usercustom_id')->get();
        $nombres = array();
        foreach ($parqueoUserId as $id) {
            $id = json_decode($id)->parqueo_usercustom_id;
            $user = User::select('nombre')->where('id', $id)->get();
            if ($id > 0) {
                array_push($nombres, $user[0]);
            }
        }
        
        $pagos = Pago::select('parqueo_id', 'fechapago')->get();
        $mesesLiteral = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $parqueo = CrearSitio::select('id', 'parqueo.usercustom_id', 'parqueo.sitio', 'parqueo.fechaasig', 'parqueo.zona')->where('usercustom_id', '!=', 0)->get();
        
        for ($i = 0; $i < count($pagos); $i++) { 
            $fecha = json_decode($pagos[$i])->fechapago;
            $mesNumero = date("n", strtotime($fecha));
            $pagos[$i]->mesLiteral = $mesesLiteral[$mesNumero-1];
            $pagos[$i]->nombre = json_decode($nombres[$i])->nombre;
            $nombreSitio = CrearSitio::select('sitio')->where('id', $pagos[$i]->parqueo_id)->get();
            $pagos[$i]->sitio = json_decode($nombreSitio[0])->sitio;
            json_encode($pagos[$i]);
        }
        /*************************/
        //Control de fechas
        $diaActual = date("d");
        date("Y-m-d H:i:s");
        
        //if($diaActual == 10){
        if(true){
            for ($i = 0; $i < count($parqueo); $i++) {
                $fechaActual = date("Y-m-d H:i:s");
                $pagosPersona = Pago::select('fechapago')->where('parqueo_usercustom_id', $parqueo[$i]->usercustom_id)->orderBy('fechapago', 'desc')->first();
                $fechaPersona = json_decode($pagosPersona)->fechapago;
                return $mesPersona = date("n", strtotime($fechaPersona));
                if(true){
                    
                }
                $datosJson = $parqueo[$i];
                $idUserPagos = json_decode($datosJson)->usercustom_id;
                //$tarifa;
                $idParqueo = json_decode($datosJson)->id;
                //$fechapago;
                
                $pago = new Pago;
                $pago->parqueo_usercustom_id = $idUserPagos;
                $pago->tarifa_id = "";
                $pago->parqueo_id = $idParqueo;
                $pago->fechapago = "";
                $pago->estado = 0; //0->no pagado
                //$pago->save();
            }
        }
        
        return view('ControlPagos.VisualizarListaPagosCliente', compact('pagos'));
    }

    public function controlPago($parqueo)
    {
        for ($i = 0; $i < count($parqueo); $i++) {
            $fechaActual = date("Y-m-d H:i:s");
            if(true){

            }
            $datosJson = $parqueo[$i];
            $idUserPagos = json_decode($datosJson)->usercustom_id;
            //$tarifa;
            $idParqueo = json_decode($datosJson)->id;
            //$fechapago;
            
            $pago = new Pago;
            $pago->parqueo_usercustom_id = $idUserPagos;
            $pago->tarifa_id = "";
            $pago->parqueo_id = $idParqueo;
            $pago->fechapago = "";
            $pago->estado = 0; //0->no pagado
            //$pago->save();
        }
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
