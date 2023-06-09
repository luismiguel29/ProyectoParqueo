<?php

namespace App\Http\Controllers\AdmInfoClientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;


class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    public function index(Request $request)
    {
        $clientes = User:: select('usercustom.id', 'usercustom.rol', 'usercustom.nombre',
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
            'ci' => 'required|unique:usercustom|digits_between:8,20|numeric',
            'telefono' => 'required|numeric|digits_between:8,20',
            'correo' => 'required|unique:usercustom|email|max:70',
            'contraseña' => 'required|max:20',
            'repetircontraseña' => 'same:contraseña',
        ], [
            'nombre.regex' => 'El campo nombre solo puede tener letras',
            'apellido.regex' => 'El campo apellido solo puede tener letras',

        ]);

            $usercustom = new User();
            $usercustom->rol = 'cliente';
            $usercustom->nombre = $request->input('nombre');
            $usercustom->apellido = $request->input('apellido');
            $usercustom->usuario = $request->input('usuario');
            $usercustom->ci = $request->input('ci');
            $usercustom->telefono = $request->input('telefono');
            $usercustom->correo = $request->input('correo');
            $usercustom->password = Hash::make($request->input('contraseña'));
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
            'nombre.regex' => 'El campo nombre solo puede tener letras',
            'telefono.numeric' => 'El campo telefono solo puede tener numeros positivos',
        ]);

            $usercustom = User:: find($id);

            $usercustom->nombre = $request->input('nombre');
            $usercustom->apellido = $request->input('apellido');
            $usercustom->usuario = $request->input('usuario');
            $usercustom->ci = $request->input('ci');
            $usercustom->telefono = $request->input('telefono');
            $usercustom->correo = $request->input('correo');
            $usercustom->save ();
            return redirect ()->route('Cliente.listacliente')->with('message', '¡Edicion de datos exitoso!');
        
    }
    public function edit($id)
    {
        $user =User::find($id);
        return view('Cliente.ClienteForm', compact('user' ));
    }



    public function destroy(Request $request)
    {
        error_log($request->id);
        User::find($request->id)->delete();
        return back();
    }

}
