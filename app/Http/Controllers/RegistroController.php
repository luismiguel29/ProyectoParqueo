<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Parqueo;
use App\Models\Registro;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* public function __construct()
     {
         $this->middleware('auth', ['except' => []]);
     } */

    public function index()
    {
        $fecha_ini = date('Y-m-d 00:00:00');
        $fechaactual = now();
        $listaregistro = Registro::where('ingreso', ">", $fecha_ini)->get();
        return view('vehiculo.listaRegEntrSal', compact('listaregistro'));
    }

    public function buscarplaca(Request $request)
    {
        $placa = [];

        if ($request->has('q')) {
            $search = $request->q;
            $placa = Vehiculo::select("id", "placa")
                ->where('placa', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($placa);
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
            'livesearch' => 'required',
        ], [
            'livesearch.required' => 'Seleccione un # de placa',
        ]);

        $placa = Vehiculo::where('id', request('livesearch'))->first();
        $sitio = Parqueo::where('usercustom_id', $placa->usercustom_id)->first();
        $invitado = Parqueo::where('invitado', $placa->usercustom_id)->first();

        if ($sitio!=null) {           
            $ingreso = new Registro();
            $ingreso->vehiculo_usercustom_id = $placa->usercustom_id;
            $ingreso->vehiculo_id = request('livesearch');
            $ingreso->sitio = $sitio->sitio;
            $ingreso->zona = $sitio->zona;
            $ingreso->placa = $placa->placa;
            $ingreso->ingreso = now();
            $ingreso->estado = 1;
            $ingreso->save();
            return redirect()->route('listaregistro');
        }else if($invitado!=null){
            $ingreso = new Registro();
            $ingreso->vehiculo_usercustom_id = $placa->usercustom_id;
            $ingreso->vehiculo_id = request('livesearch');
            $ingreso->sitio = $invitado->sitio;
            $ingreso->zona = $invitado->zona;
            $ingreso->placa = $placa->placa;
            $ingreso->ingreso = now();
            $ingreso->estado = 1;
            $ingreso->save();
            return redirect()->route('listaregistro');
        }else{
            return redirect()->route('listaregistro')->with('message', '¡El usuario no tiene un sitio asignado!');
        }
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
        $registro = Registro::find($id);
        $registro->salida = now();
        $registro->estado = 0;
        $registro->save();
        return redirect()->route('listaregistro');
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
