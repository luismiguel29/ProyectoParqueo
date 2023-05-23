<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

  public function cerrarsesion()
  {
    Auth::logout();
    return redirect()->route('login')->with('message', 'Sesión cerrada');
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
      'usuario' => ['required', 'string'],
      'contraseña' => ['required', 'string'],
    ]);

    $usuario = User::where('usuario', $request->input('usuario'))->exists();
    $password = User::where('usuario', $request->input('usuario'))->where('contrasenia', $request->input('contraseña'))->exists();
    $verificar = User::where('usuario', $request->input('usuario'))->where('contrasenia', $request->input('contraseña'))->first();
    if ($usuario) {
      if ($password) {
        $request->session()->regenerate();
        $request->session()->put('sesion', $verificar);
        //return redirect()->route('verparqueo')->with(['verificar' => $verificar]);
        return redirect()->route('verparqueo')->with('verificar', $verificar);
      } else {
        return back()->with('alerta', 'Contraseña incorrecta!')->withInput();
      }
    } else {
      return redirect()->route('login')->with('alerta', 'Usuario no registrado!');
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
