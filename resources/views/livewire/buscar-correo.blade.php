<?php

use App\Models\Mensaje;
use App\Models\Cliente;
class BuscarCorreo extends Component {
    public $term;
    public $users;

    public function updatedTerm(){
        $this->users = User::where('name', 'like', '%' . $this->term . '%')
            ->get()
            ->toArray();
    }
    public function render()
    {
        return view('livewire.search-drop-down');
    }
}

/*<div>
    <select  class="form-control select2" wire:model="search">
        <option value=""></option>
        @foreach ($users as $user)
            <option value="{{ $user['id'] }}">{{ $user['nombre'] }}</option>
        @endforeach
    </select>
</div>*/
