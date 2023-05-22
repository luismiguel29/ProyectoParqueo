<?php

namespace App\Http\Controllers\ConfiguracionParqueo;

use App\Models\ConfiguracionParqueo\CrearSitio;
use App\Models\EnviarSolicitud;
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

        $request->validate([
            'nroespacio' => ['required'],
          ],[
            'nroespacio.required', 'El campo Nro de espacio es obligatorio'
          ]);

        $crear = new CrearSitio;
      
        $crear->sitio=$request->input('nroespacio');
        $crear->zona=$request->input('zona');
        $crear->descripcion=$request->input('observacion');
        // $crear->estado=$request->input('estado');
        $crear->save();
        return redirect()->route('sites.index')->with('success', '¡Registro exitoso!');
      
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
