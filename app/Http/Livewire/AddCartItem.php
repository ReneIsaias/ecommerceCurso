<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;

class AddCartItem extends Component
{
    public $product;

    public $quantity;

    public $qty = 1;

    public $options = [
        'color_id' => null,
        'size_id'  => null,
    ];

    public function mount(Product $product)
    {
        $this->product = $product;

        /* $this->quantity = $this->product->quantity; */
        /* Hacemos uso del helper que definimos */
        /* $this->quantity = qty_available($this->product->id); */
        $this->quantity = Helper::qty_available($this->product->id);


        $this->options['image'] = Storage::url($this->product->image->first()->url);
        /* $this->options['image'] = $this->product->image->first()->url; */
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function addItem()
    {
        /* Agregamos un producto al carrito de compras */
        Cart::add([
            'id'        => $this->product->id,
            'name'      => $this->product->name,
            'qty'       => $this->qty,
            'price'     => $this->product->price,
            'weight'    => 550,
            'options'   => $this->options,
        ]);

        /* Actualizamos la variable $quantity */
        /* $this->quantity = qty_available($this->product->id); */
        $this->quantity = Helper::qty_available($this->product->id);

        /* Resetemaos el valor de qty a 1 una vez que agregamos un producto */
        $this->reset('qty');

        /* Notificamos por medio de un evento que hemos agregado un producto al carrito de compras */
        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}