<?php

namespace App\Http\Controllers\AtencionSolicitud;
use App\Models\AtencionSolicitud; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnviarSolicitudController extends Controller
{
    public function index(Request $request)
    {
        $horarios = AtencionSolicitud::select('tarifa.id','tarifa.nombre','tarifa.precio', 'tarifa.estado')->get();
        return view('AtencionSolicitud.EnviarSolicitud', compact('horarios')); 
       // return view('/AtencionSolicitud/EnviarSolicitud');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_tarifa' => 'required|regex:/^[a-zA-Z0-9\s]+$/|min:5|max:30',
            'precio' => 'numeric|required|min:10|max:999',
        ], [
            'nombreprod.regex' => 'El campo nombre solo puede tener letras',
        ]);
        
        $crear = new AtencionSolicitud();
        $crear->nombre=$request->input('nombre_tarifa');
        $crear->precio=$request->input('precio');
        $crear->estado=0;
        $crear->save();
        return redirect()->route('enviarSolicitud.index')->with('success', '¡Registro exitoso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id, Request $request)
    {
        /*$request->validate([
            'precio' =>  'numeric|required|min:10|max:999',
        ]);*/
        $tarifa = AtencionSolicitud::findOrFail($id);
        $tarifa->nombre = $request->input('nombre');
        $tarifa->precio = $request->input('precio');
        $tarifa->save();
        return redirect()->route('enviarSolicitud.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre_tarifa' => 'required|regex:/^[\pL\s]+$/u|min:2|max:30',
            'precio' =>  'numeric|required|min:10|max:999',
        ], [
            'nombreprod.regex' => 'El campo nombre solo puede tener letras',
        ]);
        
        $crear = new AtencionSolicitud();
        $crear->nombre=$request->input('nombre_tarifa');
        $crear->precio=$request->input('precio');
        $crear->estado=0;
        
        $crear->save();
        return redirect()->route('enviarSolicitud.index')->with('success', '¡Registro exitoso!');
    }

    public function destroy($id)
    {
        $hora = AtencionSolicitud::findOrFail($id);
        $hora->delete();
        return redirect()->route('enviarSolicitud.index');
    }
}
