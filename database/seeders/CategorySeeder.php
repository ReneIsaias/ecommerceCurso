<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'      => 'Celulares y tablets',
                'slug'      => Str::slug('Celulares y tablets'),
                'icon'      => '<i class="fas fa-mobile-alt"></i>"',
            ],
            [
                'name'      => 'TV, audio y video',
                'slug'      => Str::slug('TV, audio y video'),
                'icon'      => '<i class="fas fa-tv"></i>"',
            ],
            [
                'name'      => 'Consola y videojuegos',
                'slug'      => Str::slug('Consola y videojuegos'),
                'icon'      => '<i class="fas fa-gamepad"></i>"',
            ],
            [
                'name'      => 'Computación',
                'slug'      => Str::slug('Computación'),
                'icon'      => '<i class="fas fa-laptop"></i>"',
            ],
            [
                'name'      => 'Moda',
                'slug'      => Str::slug('Moda'),
                'icon'      => '<i class="fas fa-tshirt"></i>"',
            ],
        ];

        foreach($categories as $category)
        {
            $categoria = Category::factory(1)->create($category)->first();
            /* Llamamos al factory brand y creamos cuatro registros los cuales alamcenamos en una variable */
            $brands = Brand::factory(4)->create();
            /* Reorremos el arreglo */
            foreach($brands as $brand)
            {
                /* Recuperamos la relacion de bran con categorias y agreamos las bran con la categoría */
                $brand->categories()->attach($categoria->id);
            } 

        }
    }
}
