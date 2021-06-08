<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product, $colors;
    
    public $color_id = "";

    public $quantity = 0;

    public $qty = 1;

    public $options = [];

    public function mount(Product $product)
    {
        $this->colors = $product->colors;

        $this->quantity = $this->product->quantity;

        $this->options['image'] = Storage::url($this->product->image->first()->url);

    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    /* Este metodo se ejecuta cada que cambia la propiedad con la que este relacionado */
    public function updatedColorId($value)
    {
        $color = $this->product->colors->find($value);
        /* Obtenmos el valor de quantity del color que seleccionamos en el select del produucto que estamos trabajando */
        $this->quantity = $color->pivot->quantity;

        $this->options['color'] = $color->name;
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

        /* Notificamos por medio de un evento que hemos agregado un producto al carrito de compras */
        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
