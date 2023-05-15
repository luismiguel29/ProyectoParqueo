<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculo = Vehiculo::all();
        return view('vehiculo.listavehiculo', compact('vehiculo'));
    }

    public function registrar()
    {
        return view('vehiculo.registrarvehiculo');
    }

    public function vistaeditar($id)
    {
        $vehiculo = Vehiculo::where('id', $id)->get();
        return view('vehiculo.editarvehiculo', compact('vehiculo'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'tipo' => 'required',
            'placa' => 'required|unique:vehiculo,placa',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
        ],[
            
        ]);

        $sesion = session()->get('sesion');

        $vehiculo = new Vehiculo();
        $vehiculo->usercustom_id = $sesion->id;
        $vehiculo->tipo = $request->input('tipo');
        $vehiculo->placa = $request->input('placa');
        $vehiculo->marca = $request->input('marca');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->color = $request->input('color');
        $vehiculo->save();
        return redirect()->route('listavehiculo')->with('success', '¡Registro exitoso!');
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
        $request->validate([
            'tipo' => 'required',
            'placa' => 'required|unique:vehiculo,placa',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
        ],[
            
        ]);

        $vehiculo = Vehiculo::find($id);
        $vehiculo->usercustom_id = 1;
        $vehiculo->tipo = $request->input('tipo');
        $vehiculo->placa = $request->input('placa');
        $vehiculo->marca = $request->input('marca');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->color = $request->input('color');
        $vehiculo->save();
        return redirect()->route('listavehiculo')->with('success', '¡Actualizacion exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehiculo::find($id)->delete();
        return redirect()->route('listavehiculo');
    }

    public function listaRegistro()
    {
        return view('vehiculo.listaRegEntrSal');
    }

}
