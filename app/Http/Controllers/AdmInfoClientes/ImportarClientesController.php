<?php

namespace App\Http\Controllers\AdmInfoClientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;
use League\Csv\Statement;


class ImportarClientesController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    } 
    public function store(Request $request)
    {
        $clientes = $request->file('importar')->get();
        $clientesUtf8 = mb_convert_encoding($clientes, 'UTF-8', 'ISO-8859-1');
        $reader = Reader::createFromString($clientesUtf8);
        $reader->setHeaderOffset(0);
        $records = (new Statement())->process($reader);
        foreach ($records as $record) {
            /* $usercustom = new User();
            $usercustom->nombre = $record ['NOMBRE'];            
            $usercustom->apellido = $record ['APELLIDO'];
            $usercustom->ci = $record ['CI'];            
            $usercustom->telefono = $record ['TELEFONO'];
            $usercustom->correo = $record ['CORREO'];
            $usercustom->usuario = $record ['USUARIO'];
            $usercustom->password = Hash::make($record ['PASSWORD']);
            $usercustom->rol = $record ['ROL'];
            $usercustom->save(); */
            $usercustom = new Docente();
            $usercustom->nombres = $record ['Nombres'];            
            $usercustom->ci = $record ['CI'];
            $usercustom->cargo = $record ['Cargo'];            
            $usercustom->carga_horaria = $record ['Hrs'];
            $usercustom->carrera = $record ['CARRERA'];
            $usercustom->facultad = $record ['FACULTAD'];
            $usercustom->save();
        }
        
            return redirect ()->route('Cliente.listacliente')->with('success', '¡Registro exitoso!');
    }
    
}

