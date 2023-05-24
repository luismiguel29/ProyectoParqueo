<?php

namespace App\Http\Controllers\AdmInfoClientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente:: select('usercustom.id', 'usercustom.rol', 'usercustom.nombre',
        'usercustom.apellido','usercustom.usuario', 'usercustom.ci','usercustom.telefono', 'usercustom.correo') 
        ->where('rol', 'cliente')
        -> get();
        return view('Cliente.ListaCliente', compact('clientes')); 
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:20|regex:/^[A-Za-z\s]+$/',
            'apellido' => 'required |max:20|regex:/^[A-Za-z\s]+$/',
            'usuario' => 'required|unique:usercustom|max:20|alpha_num',
            'ci' => 'required|unique:usercustom|digits_between:1,20|numeric',
            'telefono' => 'required|digits_between:1,20|numeric',
            'correo' => 'required|unique:usercustom|email|max:70',
            'contraseña' => 'required|max:20',
        ], [
            'nombreprod.regex' => 'El campo nombre solo puede tener letras',
        ]);

            $usercustom = new Cliente();
            $usercustom->tipo = 'cliente';
            $usercustom->nombre = $request->input('nombre');
            $usercustom->apellido = $request->input('apellido');
            $usercustom->usuario = $request->input('usuario');
            $usercustom->ci = $request->input('ci');
            $usercustom->telefono = $request->input('telefono');
            $usercustom->correo = $request->input('correo');
            $usercustom->contrasenia = Hash::make($request->input('contraseña'));
            $usercustom->save();
            return redirect ()->route('Cliente.listacliente')->with('success', '¡Registro exitoso!');
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
            'nombre' => 'required|max:20|regex:/^[A-Za-z\s]+$/' ,
            'apellido' => 'required |max:20|regex:/^[A-Za-z\s]+$/',
            'usuario' => 'required|max:20|alpha_num',
            'ci' => 'required|digits_between:1,20|numeric',
            'telefono' => 'required|digits_between:1,20|numeric',
            'correo' => 'required|email|max:70',
    
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
            $usercustom->contrasenia = Hash::make($request->input('contraseña'));
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
