<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartItemSize extends Component
{
    public $product, $sizes;

    public $size_id = "";

    public $colors = [];

    public $quantity = 0;
    
    public $qty = 1;

    public $color_id = "";

    public $options = [];
    
    public function mount(Product $product)
    {
        $this->product = $product;

        $this->sizes = $this->product->sizes;

        /* $this->quantity = $this->product->quantity; */

        $this->options['image'] = Storage::url($this->product->image->first()->url);
    }

    public function updatedSizeId($value)
    {   
        /* Recuperamos la talla que seleccionamos */
        $size = Size::find($value);

        $this->colors = $size->colors;

        $this->options['size'] = $size->name;
    }

    public function updatedColorId($value)
    {
        /* Recuperamos la talla que seleccionamos */
        $size = Size::find($this->size_id);
        /* Almacenamos el color que se seleccion */
        $color = $size->colors->find($value);
        /* Obtenmos el valor de quantity del color que seleccionamos en el select del produucto que estamos trabajando */
        /* $this->quantity = $color->pivot->quantity; */
        /* Hacemos uso del helper que definimos */
        $this->quantity = qty_available($this->product->id, $color->id, $size->id);
        /* Pasamos el color a la variable options */
        $this->options['color'] = $color->name;
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
        $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);

        /* Resetemaos el valor de qty a 1 una vez que agregamos un producto */
        $this->reset('qty');

        /* Notificamos por medio de un evento que hemos agregado un producto al carrito de compras */
        $this->emitTo('dropdown-cart', 'render');
    }
    
    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
