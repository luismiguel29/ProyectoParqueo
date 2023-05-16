<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class Select2SearchController extends Controller
{
    public function selectSearch(Request $request)
    {
    	$movies = [];

        if($request->has('q')){
            $search = $request->q;
            $movies =Vehiculo::select("id", "placa")
            		->where('placa', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($movies);
    }
}
