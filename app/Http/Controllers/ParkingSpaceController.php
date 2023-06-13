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
    
    public function pdf(){ //***************************/
        $listSites = ParkingSpace::all();
        //$pdf = Pdf::loadView('informe.reporte', compact('listSites'));
        $pdf = Pdf::setPaper([0.0, 0.0, 400.53, 700.28],'landscape')->loadView('informe.reporte', compact('listSites'));
        return $pdf->stream();
        //return $pdf->download('reportee.pdf');
    }

    public function factura(){ //***************************/
        $listSites = ParkingSpace::all();
        $pdf = Pdf::setPaper('a4','landscape')->loadView('informe.factura', compact('listSites'));
        return $pdf->stream();
        //return $pdf->download('reportee.pdf');
    }
}
