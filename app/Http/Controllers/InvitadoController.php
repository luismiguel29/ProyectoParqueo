<?php

namespace App\Http\Controllers;

use App\Models\Parqueo;
use App\Models\User;
use Illuminate\Http\Request;

class InvitadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parqueo = Parqueo::where('usercustom_id', session()->get('sesion')->id)->first();
        return view('vehiculo.compartirSitio', compact('parqueo'));                   
    }

    public function buscarusuario(Request $request)
    {
        $placa = [];

        if ($request->has('q')) {
            $search = $request->q;
            $placa = User::select("id", "nombre", "apellido")
                ->where('nombre', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($placa);
    }


    public function eliminarusuario(Request $request, $id)
    {
        Parqueo::where('id', $id)
        ->update([
            'invitado' => 0,
        ]);
        return redirect()->route('listainvitado');
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
            'livesearch' => 'required',
        ], [
            'livesearch.required' => 'Seleccione un usuario',
        ]);

        Parqueo::where('id', $id)
        ->update([
            'invitado' => request('livesearch'),
        ]);        
        return redirect()->route('listainvitado');
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
