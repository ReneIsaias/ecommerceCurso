<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product, $colors;
    
    public $color_id = "";

    public $quantity = 0;

    public $qty = 1;

    public function mount(Product $product)
    {
        $this->colors = $product->colors;

        $this->quantity = $this->product->quantity;

    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }

    /* Este metodo se ejecuta cada que cambia la propiedad con la que este relacionado */
    public function updatedColorId($value)
    {
        /* Obtenmos el valor de quantity del color que seleccionamos en el select del produucto que estamos trabajando */
        $this->quantity = $this->product->colors->find($value)->pivot->quantity;
    }
}
