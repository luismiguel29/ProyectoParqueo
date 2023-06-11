<?php

namespace App\Http\Controllers\ControlPagos;

use App\Http\Controllers\Controller;
use App\Models\VisualizarListaPagos;
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

        $idUsuario = session()->get('sesion')->id;
        $pagos = Pago::select('parqueo_usercustom_id', 'parqueo_id', 'fechapago', 'nombre', 'sitio', 'pago.estado','pago.id')
            ->where('parqueo_usercustom_id', $idUsuario)
            ->join('usercustom', 'usercustom.id', '=', 'pago.parqueo_usercustom_id')
            ->join('parqueo', 'parqueo.id', '=', 'pago.parqueo_id')
            ->get();


        $mesesLiteral = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        for ($i = 0; $i < count($pagos); $i++) {
            $fecha = json_decode($pagos[$i])->fechapago;
            $mesNumero = date("n", strtotime($fecha));
            $pagos[$i]->mesLiteral = $mesesLiteral[$mesNumero - 1];

            json_encode($pagos[$i]);
        }


        return view('ControlPagos.VisualizarListaPagosCliente', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $buscar;
    public function buscador()
    {
        $buscar = '%' . $this->buscar . '%';
        return AtencionSolicitud::where('tarifa', 'like', $buscar)->get();
    }
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
