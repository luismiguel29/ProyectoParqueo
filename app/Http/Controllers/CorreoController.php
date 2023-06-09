<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pago;
use App\Models\User;
use App\Models\Mensaje;
use App\Mail\EnviarCorreo;
use App\Models\Parqueo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
     {
         $this->middleware('auth', ['except' => []]);
     }

    public function index()
    {
        $correo = User::all();
        $asunto = "adjuntar asunto";
        $contenido = "Adjuntar contenido el contenido del correo es el siguiente";
        foreach ($correo as $mail) {
            Mail::to($mail->correo)->queue(new EnviarCorreo($asunto, $contenido));
            //Mail::to($mail->correo)->send(new EnviarCorreo($asunto, $contenido));
        }
        return redirect()->back();
    }

    public function crearpago()
    {
        //$fechadefinida = date('Y-m-d H:i:s');
        $fechadefinida = date('Y-m-17 00:00:00');
        $fechaactual = Carbon::parse(now())->format('Y-m-d 00:00:00');
        if ($fechaactual == $fechadefinida) {
            return "es la fecha";
        }
        return [$fechaactual, $fechadefinida];
    }

    public function notificarMora()
    {
        $mensaje = Mensaje::where('asunto', 'like', "%pendiente mensualidad%")->first();
        $parqueo = Parqueo::where('estado', 1)->get();
        foreach ($parqueo as $item) {
            $deuda = Pago::where('parqueo_usercustom_id', $item->usercustom_id)
            ->where('estado', 0)->first();
            if (!empty($deuda)) {
                Mail::to($item->usercustom->correo)->send(new EnviarCorreo($mensaje));
                //Mail::to($item->usercustom->correo)->send(new EnviarCorreo($mensaje->asunto, $mensaje->descripcion));
            }            
        }
        return redirect()->route('visualizarPagos.index')->with('message', 'Notificacion enviada correctamente');
    }

    public function mostrarCuenta()
    {
        $cuenta = User::where('id', session()->get('sesion')->id)->first();
        return view('Cliente.ClienteUpdate', compact('cuenta'));
    }

    public function actualizarCuenta($id, Request $request)
    {
        $request->validate([
            'usuario' => 'required|min:3|max:20|regex:/^[a-zA-Z0-9]+$/',
            'telefono' => 'required|min:7|max:8|regex:/^[0-9]+$/',
            'correo' => 'required|email|max:70',
            'contraseña' => 'required|min:6|max:20',
        ],[
            'usuario.regex' => 'Solo se adminiten letras y numeros con un mínimo de 3 y un máximo de 20 caracteres',
            'telefono.min' => 'Solo se adminiten numeros con un mínimo de 7 y un máximo de 8 digitos',
            'telefono.max' => 'Solo se adminiten numeros con un mínimo de 7 y un máximo de 8 digitos',
            'telefono.regex' => 'Solo se adminiten numeros con un mínimo de 7 y un máximo de 8 digitos',
            'contraseña.min' => 'La contraseña debe contener mínimo 6 caracteres',
        ]);

        User::where('id', $id)
        ->update([
            'usuario' => request('usuario'),
            'telefono' => request('telefono'),
            'correo' => request('correo'),
            'password' => Hash::make(request('contraseña')),
        ]);
        return redirect()->route('mostrarCuenta')->with('success', '¡Actualizacion de datos correctamente!');
    }
}
