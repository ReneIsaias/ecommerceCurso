<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;

use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
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
                ->OrWhere('size', true);
        })->get();

        $sizes = ['Talla S', 'Talla M', 'Talla L'];

        foreach ($products as $product) {

            foreach ($sizes as $size) {
                $product->sizes()->create([
                    'name'  => $size,
                ]);
            }

        }
    }
}
