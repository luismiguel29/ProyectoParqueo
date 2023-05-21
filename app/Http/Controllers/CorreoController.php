<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\EnviarCorreo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correo = User::all();
        $asunto = "adjuntar asunto";
        $contenido = "Adjuntar contenido el contenido del correo es el siguiente";
        foreach ($correo as $mail) {
            Mail::to($mail->correo)->queue(new EnviarCorreo($asunto, $contenido));
        }
        return redirect()->route('listavehiculo');
    }

    public function crearpago()
    {
        //$fechadefinida = date('Y-m-d H:i:s');
        $fechadefinida = date('Y-m-17 00:00:00');
        $fechaactual = Carbon::parse(now())->format('Y-m-d 00:00:00');
        if ($fechaactual==$fechadefinida) {
            return "es la fecha";
        }
        return [$fechaactual, $fechadefinida];
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
