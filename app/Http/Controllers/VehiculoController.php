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

     public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {
        if (session()->get('sesion')->rol!="cliente") {
            $vehiculo = Vehiculo::all();
        }else{
            $vehiculo = Vehiculo::where('usercustom_id', session()->get('sesion')->id)->get();
        }        
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
            'placa' => 'required|unique:vehiculo,placa|regex:/^\d{3,4}[a-zA-Z]{3}+$/|min:5|max:7',
            'marca' => 'required|regex:/^[a-zA-Z]+$/|min:3|max:15',
            'modelo' => 'required|regex:/^[a-zA-Z0-9]+$/|min:3|max:15',
            'color' => 'required|regex:/^[a-zA-Z]+$/|min:4|max:10',
        ],[
            'placa.regex' => 'El formato de placa es incorrecto, debe ingresar 3 o 4 digitos seguido de 3 letras',
            'marca.regex' => 'Solo se adminiten letras con un mínimo de 3 y un máximo de 15 caracteres',
            'modelo.regex' => 'Solo se adminiten letras y numeros con un mínimo de 3 y un máximo de 15 caracteres',
            'color.regex' => 'Solo se adminiten letras con un mínimo de 4 y un máximo de 15 caracteres'
        ]);

        $vehiculo = new Vehiculo();
        //$vehiculo->usercustom_id = $sesion->id;
        $vehiculo->usercustom_id = session()->get('sesion')->id;
        $vehiculo->tipo = $request->input('tipo');
        $vehiculo->placa = strtoupper($request->input('placa'));
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
            'marca' => 'required|regex:/^[a-zA-Z]+$/|min:3|max:15',
            'modelo' => 'required|regex:/^[a-zA-Z0-9]+$/|min:3|max:15',
            'color' => 'required|regex:/^[a-zA-Z]+$/|min:4|max:10',
        ],[
            'marca.regex' => 'Solo se adminiten letras con un mínimo de 3 y un máximo de 15 caracteres',
            'modelo.regex' => 'Solo se adminiten letras y numeros con un mínimo de 3 y un máximo de 15 caracteres',
            'color.regex' => 'Solo se adminiten letras con un mínimo de 4 y un máximo de 15 caracteres'
        ]);

        $vehiculo = Vehiculo::find($id);
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
