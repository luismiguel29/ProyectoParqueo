<?php

namespace App\Http\Controllers\RegisterAdmin;
use \DB;
use App\Models\User;
use App\Models\UserCustom;
use App\Models\Rol;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('registro.register');
    }

    public function store(Request $request)
    {
        //dd($request->get('username'));
        $this->validate($request,[
            'nombre' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
            'apellido' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
            'usuario' => 'required|unique:usercustom|min:3|max:20',
            'correo' => 'required|unique:usercustom|email|max:60',
            'telefono' => 'required|string|min:8|max:8',
            'password' => 'required|confirmed|min:6'
        ]);

        user::create([
            'rol' => strtolower($request->user_type),
            'nombre'=>($request->nombre),//strMinusculas,
            'apellido'=>$request->apellido,
            'usuario'=>Str::slug($request->usuario),
            'correo'=>$request->correo,
            'telefono'=>$request->telefono,
            'contrasenia'=>$request->password,
            'contrasenia'=>Hash::make($request->password)
        ]);

        return redirect()->route('vistaRegister')->with('success', '¡Registro exitoso!');

    }
}
