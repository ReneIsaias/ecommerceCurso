<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Eliminamos los directorios antes de crearlos */
        Storage::deleteDirectory('category');
        Storage::deleteDirectory('subcategories');
        Storage::deleteDirectory('products');

        /* Creamos los directorios donde se almacenan los elementos */
        Storage::makeDirectory('category');
        Storage::makeDirectory('subcategories');
        Storage::makeDirectory('products');

        /* Creamos al usuario administrador */
        $this->call(UserSeeder::class);
        /* Creamos las categorias que utilizaremos */
        $this->call(CategorySeeder::class);
        /* Creamos las subcategorías */
        $this->call(SubcategorySeeder::class);
        /* Agregamos los productos necesarios */
        $this->call(ProductSeeder::class);
        /* Agregamos los coleres desde es seeder */
        $this->call(ColorSeeder::class);
        /* Agregamos en la tabla intermedia de productos y color para relacionarlos */
        $this->call(ColorProductSeeder::class);
        /* Agregamos en la tabla sizes nuevos valores y los relaciono con productos que si cumplan */
        $this->call(SizeSeeder::class);
        /* Agregamos datos en la tabla entre tallas y colores de un producto */
        $this->call(ColorSizeSeeder::class);
    }
}
