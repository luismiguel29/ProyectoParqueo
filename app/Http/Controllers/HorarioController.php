<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('horario.horario');
    }

    public function horarioupdate($id){
        $datos = Horario::where('id', $id)->get();
        return view('horario.horarioupdate', compact('datos'));
    }

    public function lista(){
        $horario = Horario::all();
        return view('horario.listahorario', compact('horario'));
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

        $request->validate([
            'h_apertura' => 'required',
            'h_cierre' => 'required|after:h_apertura',
            'dia' => 'required',
        ],[
            'h_cierre.after' => 'Hora de cierre debe ser mayor que hora de inicio'
        ]);

        $newhorario = new Horario();
        $newhorario->h_apertura = $request->input('h_apertura');
        $newhorario->h_cierre = $request->input('h_cierre');
        $newhorario->dia = $request->input('dia');
        $newhorario->save();

        $horario = Horario::all();
        
        /* return view('horario.listahorario', compact('horario')); */

        return redirect()->route('lista');

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

        $request->validate([
            'h_apertura' => 'required',
            'h_cierre' => 'required|after:h_apertura',
            'dia' => 'required',
        ],[
            'h_cierre.after' => 'Hora de cierre debe ser mayor que hora de inicio'
        ]);

        $edithorario = Horario::find($id);
        $edithorario->h_apertura = $request->input('h_apertura');
        $edithorario->h_cierre = $request->input('h_cierre');
        $edithorario->dia = $request->input('dia');
        $edithorario->save();
        return redirect()->route('lista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delhorario = Horario::find($id)->delete();
        return redirect()->route('lista');
    }
}
