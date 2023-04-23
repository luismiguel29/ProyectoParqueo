<?php

namespace App\Http\Controllers\ConfiguracionParqueo;

use App\Models\ConfiguracionParqueo\CrearSitio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PSpell\Config;

class CrearSitioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $datos = CrearSitio::all();
        return view('/ConfiguracionParqueo/Crear', compact('datos')); 
    }

    /**     
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crear = new CrearSitio;
      
        $crear->numero_espacio=$request->input('nroespacio');
       // $crear->estado=$request->input('zona');
        $crear->observacion=$request->input('observacion');
        $crear->save();
        return redirect('/ConfiguracionParqueo/Crear');
      
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
