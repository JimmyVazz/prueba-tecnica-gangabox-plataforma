<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
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

Auth::routes();

// Route::get('/home', function () {
//     return view('productos.index');
// });

Route::resource('/home', ProductoController::class);
Route::post('home/importProductos', [ProductoController::class, 'importProductos'])->name('importarProductos');
Route::get('/exportProductos', [ProductoController::class, 'export'])->name('exportarProductos');
