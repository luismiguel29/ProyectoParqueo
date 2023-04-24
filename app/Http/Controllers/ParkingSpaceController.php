<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingSpace;

class ParkingSpaceController extends Controller
{
    public function index()
    {
        $listSites = ParkingSpace::all();
        return view('ConfiguracionParqueo.listSite', compact('listSites'));
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
