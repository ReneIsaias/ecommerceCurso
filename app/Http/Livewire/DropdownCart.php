<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownCart extends Component
{
    /* Escuchamos cuando emiten este evento con este nombre y ejecutamos la funcion con el mismo nombre */
    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.dropdown-cart');
    }
}
