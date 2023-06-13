<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingSpace;

class ParkingSpaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       // $listSites = ParkingSpace::all();
        $datosA = ParkingSpace::where('zona', 'A')->get();
        //$datosB = ParkingSpace::where('zona', 'B')->get();
        //return view('ConfiguracionParqueo.listSite', compact('listSites', 'datosA', 'datosB'));
        return view('ConfiguracionParqueo.listSite', compact('datosA'));
    }

    public function update(Request $request, $id)
    {
        $site = ParkingSpace::findOrFail($id);
        $site->sitio = $request->input('nSitio');
        $site->descripcion = $request->input('nDescripcion');
        $site->save();
        return redirect()->route('sites.index');
    }

    public function destroy($id)
    {
        $site = ParkingSpace::findOrFail($id);
        $site->delete();
        return redirect()->route('sites.index');
    }
}
