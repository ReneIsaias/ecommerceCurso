<?php

namespace Database\Seeders;

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
        /* Eliminamos el directorio antes de crearlo */
        Storage::deleteDirectory('products');

        /* Creamos el directorio donde se almacenaran las imagenes de las categorias */
        Storage::makeDirectory('products');

        /* Creamos al usuario administrador */
        $this->call(UserSeeder::class);
        /* Creamos las categorias que utilizaremos */
        $this->call(CategorySeeder::class);
    }
}
