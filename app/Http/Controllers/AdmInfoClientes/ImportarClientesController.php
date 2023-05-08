<?php

namespace App\Http\Controllers\AdmInfoClientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;
use League\Csv\Statement;


class ImportarClientesController extends Controller{

    public function store(Request $request)
    {
        $clientes = $request->file('importar')->get();
        $reader = Reader::createFromString($clientes);
        $reader->setHeaderOffset(0);
        $records = (new Statement())->process($reader);
        foreach ($records as $record) {
            $usercustom = new Cliente();
            $usercustom->nombre = $record ['NOMBRE'];
            $usercustom->apellido = $record ['APELLIDO'];
            $usercustom->ci = $record ['CI'];
            $usercustom->telefono = $record ['TELEFONO'];
            $usercustom->correo = $record ['CORREO'];
            $usercustom->save();
        }
        
            return redirect ()->route('Cliente.listacliente')->with('success', '¡Registro exitoso!');
    }
    
}

