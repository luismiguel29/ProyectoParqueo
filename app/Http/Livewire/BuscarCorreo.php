<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
use App\Models\Cliente;

class BuscarCorreo extends Component
{
    public $search = '';
 
    public function render()
    {
        return view('livewire.buscar-correo', [
            'users' => Cliente::where('nombre','LIKE','%'.$this->search.'%')->get(),
        ]);
    }
}