<?php

namespace App\Http\Controllers\AtencionSolicitud;
use App\Models\AtencionSolicitud; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnviarSolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $horarios = AtencionSolicitud::select('tarifa.id','tarifa.nombre','tarifa.precio')->get();
        return view('AtencionSolicitud.EnviarSolicitud', compact('horarios')); 
       // return view('/AtencionSolicitud/EnviarSolicitud');
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
        $crear = new AtencionSolicitud();
      
        $crear->nombre=$request->input('nombre_sitio');
        $crear->precio=$request->input('precio');
        
        $crear->save();
        return redirect()->route('enviarSolicitud.index')->with('success', '¡Registro exitoso!');
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
        $hora = AtencionSolicitud::findOrFail($id);
        $hora->delete();
        return redirect()->route('enviarSolicitud.index');
    }
}
