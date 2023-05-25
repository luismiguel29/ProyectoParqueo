<?php

namespace App\Http\Controllers\ControlPagos;

use App\Http\Controllers\Controller;
use App\Models\VisualizarListaPagos;
use App\Models\ConfiguracionParqueo\CrearSitio;
use Illuminate\Http\Request;

class VisualizarListaPagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $horarios = CrearSitio::select('parqueo.usercustom_id','parqueo.sitio','parqueo.fechaasig')->get();
        //$horarios->usercustom_id;
        return view('ControlPagos.VisualizarListaPagos', compact('horarios')); 
       // return view('ControlPagos.VisualizarListaPagos'); 
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