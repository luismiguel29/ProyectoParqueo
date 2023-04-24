<?php

namespace App\Http\Controllers\RegisterAdmin;
use \DB;
use App\Models\User;


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
            'nombre' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'apellido' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'usuario' => 'required|unique:usercustom|min:3|max:20',
            'correo' => 'required|unique:usercustom|email|max:60',
            'telefono' => 'required|numeric',
            'password' => 'required|confirmed|min:6'
        ]);

        user::create([
            'tipo'=>$request->user_type,
            'nombre'=>Str::slug($request->nombre),//strMinusculas,
            'apellido'=>$request->apellido,
            'usuario'=>$request->usuario,
            'correo'=>$request->correo,
            'telefono'=>$request->telefono,
            'contraseña'=>$request->password
            // 'contraseña'=>Hash::make($request->password)//aumentarBd
        ]);

        return redirect()->route('crearUser')->with('success', 'Usuario guardado correctamente')->with('showModal', true);

    }
}
