<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionParqueo\CrearSitio;
use App\Models\EnviarSolicitud;
use Illuminate\Http\Request;


class VerParqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = CrearSitio::all();
        $datosA = CrearSitio::where('zona', 'A')->get();
        $datosB = CrearSitio::where('zona', 'B')->get();
        //return $datosA;
        return view('/ConfiguracionParqueo/VerParqueo', compact('datosA')); 

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
        $enviar = new EnviarSolicitud;
      
        //$enviar->sitio=$request->input('nroespacio');
        //$enviar->zona=$request->input('zona');
        $enviar->descripcion=$request->input('Descripcion');
        // $crear->estado=$request->input('estado');
        $enviar->save();
        return redirect()->route('verparqueo.index');
      
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
