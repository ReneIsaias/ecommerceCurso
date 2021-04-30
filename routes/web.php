<?php

use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('reto7', [PruebaController::class, 'reto7']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




Route::get('reto1', function () {

    $personas = 7;
    $ejecutadas = 3;

        if($personas > 0){
            for($i = 1; $i <= $personas; $i += $ejecutadas)
            {
                echo $i;
                $valor = $i;
            }
        }

        return $valor;
});