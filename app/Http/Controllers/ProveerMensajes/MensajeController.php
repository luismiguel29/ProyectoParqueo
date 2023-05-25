<?php

namespace App\Http\Controllers\ProveerMensajes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Models\Mensaje;
use App\Models\Cliente;
use Mail;
use App\Mail\Message;


class MensajeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth',['except' => []]);
    // }

    public function index(Request $request)
    {
        $mensajes = Mensaje:: select('mensaje.id', 'mensaje.asunto',
        'mensaje.descripcion',) 
        -> get();
        return view('MensajesGlobales.ListaMensajes', compact('mensajes')); 
    }

    public function register (){
        return view ('MensajesGlobales.RegistrarMensaje');
    }

    public function store(Request $request)
    {

        $request->validate([
            'asunto' => 'required|max:255|regex:/^[A-Za-z\s]+$/',
            'descripcion' => 'required |max:255',
            
        ], [
            'asunto.regex' => 'El campo asunto solo puede tener letras',
        ]);

            $usercustom = new Mensaje();
            $usercustom->asunto =$request->input('asunto') ;
            $usercustom->descripcion = $request->input('descripcion');
            
            $usercustom->save();
            return redirect ()->route('Mensaje.listamensaje')->with('success', '¡Registro exitoso!');
    }

    public function update (Request $request, $id)
    {
        $request->validate([
            'asunto' => 'required|max:255|regex:/^[A-Za-z\s]+$/',
            'descripcion' => 'required |max:255',
            
        ], [
            'asunto.regex' => 'El campo asunto solo puede tener letras',
        ]);

        $usercustom = Mensaje:: find($id);
        $usercustom->asunto =$request->input('asunto') ;
        $usercustom->descripcion = $request->input('descripcion');
        
        $usercustom->save();
        return redirect ()->route('Mensaje.listamensaje')->with('success', '¡Registro exitoso!');
    }

    public function edit($id)
    {
        $sms = Mensaje::find($id);
        return view('MensajesGlobales.RegistrarMensaje', compact('sms' ));
    }



    public function destroy(Request $request)
    {
        error_log($request->id);
        Mensaje::find($request->id)->delete();
        return back();
    }

    public function send (Request $request){
        $mensaje = Mensaje::find($request->id);
        Mail::to(Cliente::find($request->user)->correo)->send(new Message($mensaje));
        return redirect ()->route('Mensaje.listamensaje')->with('success', '¡Envio exitoso!');
        
    }

    public function sendGlobal (Request $request){
        $mensaje = Mensaje::find($request->id);
        $job = (new \App\Jobs\SendQueueEmail($mensaje))->delay(now()->addSeconds(2));
        dispatch($job);
        return redirect ()->route('Mensaje.listamensaje')->with('success', '¡Envio exitoso!');
        
    }
}
