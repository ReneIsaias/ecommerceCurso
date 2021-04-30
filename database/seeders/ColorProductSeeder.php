<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /* Recuperamos los productos cuya subcategoria tenga el atribut color en verdadero y el size en falso,
         para asi porder relacionarlos con un color a aquellos productos que si deben de tener un color */
        $products = Product::whereHas('subcategory', function(Builder $query) 
        {
            $query->where('color', true)
                  ->where('size', false);
        })->get();


        foreach($products as $product)
        {
            /* relacionamos un producto con un color en su tabla intermedia, ademas de pasarale el atributo de quantity */
            $product->colors()->attach([
                1 => [
                    'quantity'  =>  10,
                ],
                2 => [
                    'quantity'  =>  10,
                ],
                3 => [
                    'quantity'  =>  10,
                ],
                4 => [
                    'quantity'  =>  10,
                ],
                5 => [
                    'quantity'  =>  10,
                ],
                6 => [
                    'quantity'  =>  10,
                ],
            ]);
        }
    }
}
