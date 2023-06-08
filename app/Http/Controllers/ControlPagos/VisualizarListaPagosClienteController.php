<?php

namespace App\Http\Controllers\ControlPagos;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        $parqueoUserId =  CrearSitio::query()->select(['usercustom_id'])->get();
        $nombres = array();
        foreach ($parqueoUserId as $id) {
           $id = json_decode($id)->usercustom_id;
            $user = User::query()->select('nombre')->where('id', $id)->get();
            if ($id > 0) {
                array_push($nombres, $user[0]);
            }
        }

        $horarios = CrearSitio::select('parqueo.usercustom_id', 'parqueo.sitio', 'parqueo.fechaasig', 'parqueo.zona','parqueo.descripcion','parqueo.estado')->where('usercustom_id', '!=', 0)->get();
        //Control de fechas 
        $fechaPago = date('Y-m-08 H:i:s');
       $fechaactual = Carbon::parse(now())->format('Y-m-d H:i:s');
        $mesActual = strtotime($fechaactual);  
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
       $mes = date("m", $mesActual)-1;
        if ($fechaactual == $fechaPago) {
           $fechaBD = $fechaactual;
            for($i=1;$i<= count($meses);$i++){
                if($i==$mes){
                    //return $meses[$i];
                    $mesPago = $meses[$i];
                }
            } 
        } 
        for ($i = 0; $i < count($horarios); $i++) {
            //$horarios[$i]->nombre = json_decode($nombres[$i])->nombre;
            $horarios[$i]->nombres = json_decode($nombres[$i])->nombre;
            $horarios[$i]->fecha = $mesPago;
            $horarios[$i]->fechaAct = $fechaBD; // esto captura fecha actual de pago
        
            $datosJson = json_encode($horarios[$i]);
            $idPagos = json_decode($datosJson)->usercustom_id;
            $sitioPagos = json_decode($datosJson)->usercustom_id;
            $zonaPagos = json_decode($datosJson)->zona;
            $descripcionPagos = json_decode($datosJson)->descripcion;
            $estadoPagos = json_decode($datosJson)->estado;
           
            $crear = new CrearSitio;
            $crear->usercustom_id= $idPagos;
            $crear->sitio=$sitioPagos;
            $crear->zona=$zonaPagos;
            $crear->descripcion=$descripcionPagos;
            $crear->estado=$estadoPagos;
            $crear->fechaasig=$fechaBD;
            // $crear->estado=$request->input('estado');
            $crear->save();
           

            //return json_decode($horarios[$i]);
        }

        
      return view('ControlPagos.VisualizarListaPagosCliente', compact('horarios', 'nombres'));
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
