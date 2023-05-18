<?php

namespace App\Http\Controllers\ProveerMensajes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Models\Mensaje;



class MensajeController extends Controller
{
    public function index(Request $request)
    {
        $mensajes = Mensaje:: select('mensaje.id', 'mensaje.Asunto',
        'mensaje.Descripcion','mensaje.Dirigido_a') 
        //->where('tipo', 'cliente')
        -> get();
        return view('MensajesGlobales.ListaMensajes', compact('mensajes')); 
    }

    public function store(Request $request)
    {

        $request->validate([
            'asunto' => 'required|max:20|regex:/^[A-Za-z\s]+$/',
            'descripcion' => 'required |max:255|regex:/^[A-Za-z\s]+$/',
            
        ], [
            'asunto.regex' => 'El campo asunto solo puede tener letras',
        ]);

            $usercustom = new Mensaje();
            $usercustom->asunto =$request->input('asunto') ;
            $usercustom->descripcion = $request->input('descripcion');
            
            $usercustom->save();
            return redirect ()->route('Mensaje.listamensaje')->with('success', '¡Registro exitoso!');
    }
}
