<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BuscarCorreo extends Component {
    public $term;
    public $users;

    public function updatedTerm(){
        $this->users = DB::table('usercustom')
        ->join ('parqueo', 'parqueo.usercustom_id', '=', 'usercustom.id')  
        ->select('usercustom.id', 'usercustom.nombre') 
        -> get();
    }
    public function render()
    {
        $this->updatedTerm();
        return view('livewire.buscar-correo');
    }
}
