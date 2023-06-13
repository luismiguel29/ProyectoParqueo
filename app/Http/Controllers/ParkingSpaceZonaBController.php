<?php

namespace App\Http\Controllers;

use App\Models\ParkingSpace;
use Illuminate\Http\Request;

class ParkingSpaceZonaBController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $datosB = ParkingSpace::where('zona', 'B')->get();
        return view('ConfiguracionParqueo.listSiteZonaB', compact('datosB'));
    }
}
