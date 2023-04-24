<?php

namespace App\Http\Controllers\AdmInfoClientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente:: select('usercustom.id', 'usercustom.nombre',
        'usercustom.apellido','usercustom.usuario', 'usercustom.ci','usercustom.telefono', 'usercustom.correo','usercustom.tipo_vehiculo','usercustom.placa','usercustom.marca','usercustom.color','usercustom.modelo') -> get();
        return view('Cliente.ListaCliente', compact('clientes')); 
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:20' ,
            'apellido' => 'required |max:20',
            'usuario' => 'required|max:20|alpha',
            'ci' => 'required|digits_between:1,20|numeric',
            'telefono' => 'required|digits_between:1,20|numeric',
            'correo' => 'required|email|max:70',
            'contraseña' => 'required|max:20',
            /*'repetirContraseña' => 'required|max:20',*/
            'tipo_vehiculo' => 'required|max:50|alpha',
            'placa' => 'required|max:20|alpha_num',
            'marca' => 'required|max:20|alpha',
            'color' => 'required',
            'modelo' => 'required|max:20|alpha_num',
        ], [
            'nombreprod.regex' => 'El campo nombre solo puede tener letras',
        ]);

            $usercustom = new Cliente();
            $usercustom->nombre = $request->input('nombre');
            $usercustom->apellido = $request->input('apellido');
            $usercustom->usuario = $request->input('usuario');
            $usercustom->ci = $request->input('ci');
            $usercustom->telefono = $request->input('telefono');
            $usercustom->correo = $request->input('correo');
            $usercustom->contraseña = $request->input('contraseña');
            $usercustom->tipo_vehiculo = $request->input('tipo_vehiculo');
            $usercustom->placa = $request->input('placa');
            $usercustom->marca = $request->input('marca');
            $usercustom->color = $request->input('color');
            $usercustom->modelo = $request->input('modelo');
            $usercustom->save();
            return redirect ()->route('Cliente.listacliente')->with('message', '¡Registro exitoso!');
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:20' ,
            'apellido' => 'required |max:20',
            'usuario' => 'required|max:20|alpha',
            'ci' => 'required|digits_between:1,20|numeric',
            'telefono' => 'required|digits_between:1,20|numeric',
            'correo' => 'required|email|max:70',
            'contraseña' => 'required|max:20',
            /*'repetirContraseña' => 'required|max:20',*/
            'tipo_vehiculo' => 'required|max:50|alpha',
            'placa' => 'required|max:20|alpha_num',
            'marca' => 'required|max:20|alpha',
            'color' => 'required',
            'modelo' => 'required|max:20|alpha_num',
        ], [
            'nombreprod.regex' => 'El campo nombre solo puede tener letras',
        ]);

            $usercustom = Cliente:: find($id);

            $usercustom->nombre = $request->input('nombre');
            $usercustom->apellido = $request->input('apellido');
            $usercustom->usuario = $request->input('usuario');
            $usercustom->ci = $request->input('ci');
            $usercustom->telefono = $request->input('telefono');
            $usercustom->correo = $request->input('correo');
            $usercustom->contraseña = $request->input('contraseña');
            $usercustom->tipo_vehiculo = $request->input('tipo_vehiculo');
            $usercustom->placa = $request->input('placa');
            $usercustom->marca = $request->input('marca');
            $usercustom->color = $request->input('color');
            $usercustom->modelo = $request->input('modelo');
            $usercustom->save();
            return redirect ()->route('Cliente.listacliente')->with('message', '¡Edicion de datos exitoso!');
        
    }
    public function edit($id)
    {
        $user =Cliente::find($id);
        return view('Cliente.ClienteForm', compact('user' ));
    }



    public function destroy(Request $request)
    {
        error_log($request->id);
        Cliente::find($request->id)->delete();
        return back();
    }

}
