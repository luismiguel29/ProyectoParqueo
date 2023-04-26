<?php

namespace App\Http\Controllers\RegisterAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VistaRegisterController extends Controller
{
    public function index() {
        $usuarios = user::select('id', 'tipo', 'nombre', 'apellido', 'telefono', 'correo')
        ->where('tipo', '<>' , 'cliente')
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
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'usuario' => 'required|string|max:255',
        'correo' => 'required|email',
        'telefono' => 'required|string|max:255',
        // Añadir más validaciones según sea necesario
    ]);

    // Actualizar el usuario
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
