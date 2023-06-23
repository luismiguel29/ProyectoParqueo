<?php

namespace App\Http\Controllers;

use App\Models\Parqueo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $this->middleware('auth', ['except' => ['index', 'store']]);
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

    $credentials = $request->validate([
      'usuario' => 'required|min:4|max:15|regex:/^[a-zA-Z0-9]+$/',
      'password' => 'required|min:6|max:20',
    ],[
      'usuario.min' => 'El usuario debe contener mínimo 3 caracteres',
      'password.min' => 'La contraseña debe contener mínimo 6 caracteres',
    ]);

    if (Auth::attempt($credentials)) {
      $verificar = User::where('id', auth()->user()->id)->first();
      $sitio = Parqueo::where('usercustom_id', $verificar->id)->exists();
      $request->session()->regenerate();
      $request->session()->put(['sesion' => $verificar, 'sitio' => $sitio]);
      if ($verificar->rol=='administrador' || $verificar->rol=='secretaria' || $verificar->rol=='cliente') {
        return redirect()->route('verparqueo');
      } else {
        return redirect()->route('listaregistro');
      }          
      //return auth()->user()->correo;
    } else {
      return back()->with('alerta', 'Credenciales incorrectas!');
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
