<?php

    use App\Models\Product;
    use App\Models\Size;
    use Gloudemans\Shoppingcart\Facades\Cart;

    /* En esta funcion obtenemos el stock de un producto, indistintamente si tiene colo o no y talla */
    function quantity($product_id, $color_id = null, $size_id = null)
    {
        /* Obtenemos el producto del modelo Producto */
        $product = Product::find($product_id);
        /* Validamos si se paso la talla */
        if($size_id)
        {
            /* Buscamos la informacion de la talla */
            $size = Size::find($size_id);
            /* Obtenemos de la relación entre talla y color la cantidad que tiene y la alamcenamos en quantity */
            $quantity = $size->colors->find($color_id)->pivot->quantity;
        }elseif($color_id)
        {
            /* Obtenemos la cantidad entre la realcion de productos y colores la cantidad y la almacenamos en quantity */
            $quantity = $product->colors->find($color_id)->pivot->quantity;
        }else
        {
            /* Obtenemos la cantidad de productos que esten el producto */
            $quantity = $product->quantity;   
        }

        /* Devolvemos lo que hayamos obtenido en quantity */
        return $quantity;
    }

    /* En esta funcion obtenemos la cantidad de productos que hemos agregado al carrito */
    function qty_added($product_id, $color_id = null, $size_id = null)
    {
        /* Obtenemos todos los items que esten en el carrito */
        $cart = Cart::content();

        /* Buscamos en el carrito el producto que con el $product_id */
        $item = $cart->where('id', $product_id)
        /* En la options.color sea igual al $color_id */
                    ->where('options.color_id', $color_id)
        /* En la options.size sea igual a $size_id */
                    ->where('options.size_id', $size_id)
        /* LE pasamos esto para que sea un objeto y nos devulva el primero, ya que sino sería una coleccion */
                    ->first();

        /* Validamos si hay algun producto con la conuslta de arriba */
        if($item)
        {
            /* En caso de que sí, devolvemos ese item con el valor en qty que es el la cantidad que tiene */
            return $item->qty;
        }else
        {
            /* EN caso contrario devolvemos 0 */
            return 0;
        }

        /* Esta funcion devuelve la diferencia entre las dos funciones anteriores, es decir el stock disponible */
        function qty_available($product_id, $color_id = null, $size_id = null)
        {
            /* Hacemos la resta entre estas dos funciones para saber el stock dispobible */
            return quantity($product_id, $color_id, $size_id) - qty_added($product_id, $color_id, $size_id);
        }
    }

?>