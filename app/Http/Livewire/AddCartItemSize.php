<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItemSize extends Component
{
    public $product;
    
    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
