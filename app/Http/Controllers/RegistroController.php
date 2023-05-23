<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Vehiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegistroController extends Controller
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
        $fecha_ini = date('Y-m-d 00:00:00');
        $fechaactual = now();
        $listaregistro = Registro::where('ingreso', ">", $fecha_ini)->get();
        return view('vehiculo.listaRegEntrSal', compact('listaregistro'));
    }

    public function buscarplaca(Request $request)
    {
    	$placa = [];

        if($request->has('q')){
            $search = $request->q;
            $placa =Vehiculo::select("id", "placa")
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
        ],[
            'livesearch.required' => 'Seleccione un # de placa',
        ]);

        $sesion = session()->get('sesion');
        
        $placa = Vehiculo::where('id', request('livesearch'))->first();

        $ingreso = new Registro();
        $ingreso->vehiculo_usercustom_id = $placa->usercustom_id;
        $ingreso->vehiculo_id = request('livesearch');
        $ingreso->sitio = '1A';
        $ingreso->placa = $placa->placa;
        $ingreso->ingreso = now();
        $ingreso->estado = 1;
        $ingreso->save();
        return redirect()->route('listaregistro');

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
