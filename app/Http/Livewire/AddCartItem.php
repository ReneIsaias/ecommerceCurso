<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class AddCartItem extends Component
{
    public $product;

    public $quantity;

    public $qty = 1;

    public function mount(Product $product)
    {
        $this->product = $product;

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
        return view('livewire.add-cart-item');
    }
}
