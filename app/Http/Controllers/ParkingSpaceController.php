<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingSpace;
use Barryvdh\DomPDF\Facade\Pdf; //***************************/

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
        $request->validate([
            'sitio' => 'required | numeric | max:999'
        ]);
        
        $site = ParkingSpace::findOrFail($id);
        $site->sitio = $request->input('sitio');
        $site->descripcion = $request->input('nDescripcion');
        $site->save();
        //return redirect()->route('sites.index');
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $site = ParkingSpace::findOrFail($id);
        $site->delete();
        //return redirect()->route('sites.index');
        return redirect()->back();
    }
    
    public function comprobante(){ //***************************/
        $listSites = ParkingSpace::all();
        $pdf = Pdf::setPaper([0.0, 0.0, 400.53, 700.28],'landscape')->loadView('informe.comprobante', compact('listSites'));
        return $pdf->stream();
        //return $pdf->download('comprobantee.pdf');
    }
}
