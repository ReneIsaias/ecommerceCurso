<?php

namespace App\Http\Livewire;

use App\Helpers\Helper;
use App\Models\Color;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartItemSize extends Component
{
    public $rowId, $qty, $quantity;

    public function mount()
    {
        $item = Cart::get($this->rowId);

        $this->qty = $item->qty;

        $color = Color::where('name', $item->options->color)->first();

        $size = Size::where('name', $item->options->size)->first();

        $this->quantity = Helper::qty_available($item->id, $color->id, $size->id);
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
        /* Actualiamos el valor de qty en el carrito */
        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }
    
    public function render()
    {
        return view('livewire.update-cart-item-size');
    }
}
