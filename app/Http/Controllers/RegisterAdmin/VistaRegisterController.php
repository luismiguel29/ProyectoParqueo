<?php

namespace App\Http\Controllers\RegisterAdmin;

use App\Models\UserCustom;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VistaRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $usuarios = User::select('id', 'rol', 'nombre','usuario', 'apellido', 'telefono', 'correo')
        ->where('rol', '<>' , 'cliente')
        ->get();

        return view('registro.visualizarUsr',['usuarios' => $usuarios]);

    }

    public function edit($id){
    $usuario = User::findOrFail($id);
    return view('registro.register', ['usuario' => $usuario])->with('success', 'Usuario actualizado correctamente');
    }


    public function update(Request $request, $id){
    $usuario = User::findOrFail($id);

    // Validar los datos
    $request->validate([
        'nombre' => 'required|string|min:2|max:30',
        'apellido' => 'required|string|min:2|max:30',
        'usuario' => 'required|string|min:3|max:20',
        'correo' => 'required|email',
        'telefono' => 'required|string|min:8|max:8',
        // Añadir más validaciones según sea necesario
    ]);

    // Actualizar el usuario
    $usuario->rol = strtolower($request->user_type);
    $usuario->nombre = $request->input('nombre');
    $usuario->apellido = $request->input('apellido');
    $usuario->usuario = $request->input('usuario');
    $usuario->correo = $request->input('correo');
    $usuario->telefono = $request->input('telefono');
    // Añadir más campos según sea necesario

    $usuario->save();

    return redirect()->route('vistaRegister')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id){
    $usuario = User::findOrFail($id);
    $usuario->delete();
    // Reiniciar el ID de la tabla de usuarios
    //$this->resetId();

    return redirect()->route('vistaRegister');
    // ->with('success', 'Usuario eliminado correctamente')
    }

    // public function resetId() {
    //     // Vaciar la tabla de usuarios
    //     DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    //     User::truncate();
    //     DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    //     // Reiniciar el AUTO_INCREMENT a 1 (o 0)
    //     DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');
    // }

}
