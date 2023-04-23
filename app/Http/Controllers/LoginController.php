<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* public function __construct()
    {
        $this->middleware('auth', ['except' => ['store','index', 'registro', 'registrarUser']]);
    } */


    public function index()
    {
        return view('loginuser.login');
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
        $credenciales = $request->validate([
            'usuario'=> ['required', 'string'],
            'contraseña'=>['required', 'string'],
          ]);
      
          $usuario = User::where('usuario', $request->input('usuario'))->exists();
          $password = User::where('usuario', $request->input('usuario'))->where('contraseña', $request->input('contraseña'))->exists();
          $verificar = User::where('usuario', $request->input('usuario'))->where('contraseña', $request->input('contraseña'))->first();
          if ($usuario) {
            if ($password) {             
              $request->session()->regenerate();
              return view('horario.horario', compact('verificar'));
            } else {
              return back()->with('alerta', 'Contraseña incorrecta!')->withInput();
            }
          } else {
            return back()->with('alerta', 'Usuario no registrado!');
          }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
