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

    public function updatedSizeId($value)
    {
        $size = Size::find($value);

        $this->colors = $size->colors;
    }

    public function mount(Product $product)
    {
        $this->sizes = $product->sizes;
    }
    
    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
