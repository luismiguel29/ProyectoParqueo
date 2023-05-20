<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
use App\Models\Cliente;
use App\Models\User;
class BuscarCorreo extends Component {
    public $term;
    public $users;

    public function updatedTerm(){
        $this->users = User::all()-> toArray();
    }
    public function render()
    {
        $this->updatedTerm();
        return view('livewire.buscar-correo');
    }
}
