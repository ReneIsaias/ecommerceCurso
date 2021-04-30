<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            /* Celulares y Tablets */
            [
                'category_id'   => 1,
                'name'          => 'Celulars y smartphones',
                'slug'          => Str::slug('Celulars y smartphones'),
                'color'         => true,
                'size'          => false,
            ],
            [
                'category_id'   => 1,
                'name'          => 'Accesorios para celulares',
                'slug'          => Str::slug('Accesorios para celulares'),
                'color'         => false,
                'size'          => false,
            ],
            [
                'category_id'   => 1,
                'name'          => 'Smartwatches',
                'slug'          => Str::slug('Smartwatches'),
                'color'         => false,
                'size'          => false,
            ],
            /* TV, audio y videos */
            [
                'category_id'   => 2,
                'name'          => 'Tv y Audio',
                'slug'          => Str::slug('Tv y Audio'),
                'color'         => true,
                'size'          => false,
            ],
            [
                'category_id'   => 2,
                'name'          => 'Audios',
                'slug'          => Str::slug('Audios'),
                'color'         => false,
                'size'          => true,
            ],
            [
                'category_id'   => 2,
                'name'          => 'Audio para autos',
                'slug'          => Str::slug('Audio para autos'),
                'color'         => false,
                'size'          => false,
            ],
            /* Consolo y videosjuegos */
            [
                'category_id'   => 3,
                'name'          => 'Xbox',
                'slug'          => Str::slug('Xbox'),
                'color'         => true,
                'size'          => false,
            ],
            [
                'category_id'   => 3,
                'name'          => 'Play Station',
                'slug'          => Str::slug('Play Station'),
                'color'         => false,
                'size'          => true,
            ],
            [
                'category_id'   => 3,
                'name'          => 'Videojuegos para PC',
                'slug'          => Str::slug('Videojuegos para PC'),
                'color'         => false,
                'size'          => false,
            ],
            [
                'category_id'   => 3,
                'name'          => 'Nintendo',
                'slug'          => Str::slug('Nintendo'),
                'color'         => false,
                'size'          => false,
            ],
            /* Computacion */
            [
                'category_id'   => 4,
                'name'          => 'Portatiles',
                'slug'          => Str::slug('Portatiles'),
                'color'         => true,
                'size'          => false,
            ],
            [
                'category_id'   => 4,
                'name'          => 'Pc de Escritorio',
                'slug'          => Str::slug('Pc de Escritorio'),
                'color'         => false,
                'size'          => true,
            ],
            [
                'category_id'   => 4,
                'name'          => 'Almacenamiento',
                'slug'          => Str::slug('Almacenamiento'),
                'color'         => false,
                'size'          => false,
            ],
            [
                'category_id'   => 4,
                'name'          => 'Accesorios de computadoras',
                'slug'          => Str::slug('Accesorios de computadoras'),
                'color'         => false,
                'size'          => false,
            ],
            /* Moda */
            [
                'category_id'   => 5,
                'name'          => 'Mujeres',
                'slug'          => Str::slug('Mujeres'),
                'color'         => true,
                'size'          => true,
            ],
            [
                'category_id'   => 5,
                'name'          => 'Hombres',
                'slug'          => Str::slug('Hombres'),
                'color'         => true,
                'size'          => true,
            ],
            [
                'category_id'   => 5,
                'name'          => 'Lentes',
                'slug'          => Str::slug('Lentes'),
                'color'         => false,
                'size'          => false,
            ],
            [
                'category_id'   => 5,
                'name'          => 'Relojes',
                'slug'          => Str::slug('Relojes'),
                'color'         => false,
                'size'          => false,
            ],
        ];

        /* Iteramos el array de subcategorias */
        foreach($subcategories as $subcategory)
        {
            /* Llamamos al factory y le pasamos que se cree 1 por cada iteración
             pasando por el arreglo y factory se crea la imagen */
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
