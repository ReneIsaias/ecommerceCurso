<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Size;
use Livewire\Component;

class AddCartItemSize extends Component
{
    public $product, $sizes;

    public $size_id = "";

    public $colors = [];

    public $quantity = 0;
    
    public $qty = 1;

    public $color_id = "";

    public function updatedSizeId($value)
    {   
        /* Recuperamos la talla que seleccionamos */
        $size = Size::find($value);

        $this->colors = $size->colors;
    }

    public function updatedColorId($value)
    {
        /* Recuperamos la talla que seleccionamos */
        $size = Size::find($this->size_id);

        /* Obtenmos el valor de quantity del color que seleccionamos en el select del produucto que estamos trabajando */
        $this->quantity = $size->colors->find($value)->pivot->quantity;
    }

    public function mount(Product $product)
    {
        $this->sizes = $product->sizes;

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
        return view('livewire.add-cart-item-size');
    }
}
