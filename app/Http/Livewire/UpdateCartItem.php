<?php

namespace App\Http\Livewire;

use App\Helpers\Helper;
use Gloudemans\Shoppingcart\Facades\Cart;

use Livewire\Component;

class UpdateCartItem extends Component
{
    public $rowId, $qty;

    public $quantity;

    public function mount()
    {
        $item = Cart::get($this->rowId);
        
        $this->qty = $item->qty;

        $this->quantity = Helper::qty_available($item->id);
    }
    
    public function decrement()
    {
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);

        /* $this->emitTo('dropdown-cart', 'render'); */
        $this->emit('render');
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
        /* Actualiamos el valor de qty en el carrito */
        Cart::update($this->rowId, $this->qty);

        /* $this->emitTo('dropdown-cart', 'render'); */
        $this->emit('render');
    }
    
    public function render()
    {
        return view('livewire.update-cart-item');
    }
}
