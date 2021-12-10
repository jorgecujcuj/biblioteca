<?php

use Illuminate\Support\Facades\Route;
//AGREGUE
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AutoreController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\BusquedaController;

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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('/', BusquedaController::class)->parameters(['/' => 'busqueda'])->names('busquedas');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('sasdadsasd', CategoriaController::class)->parameters(['categorias' => 'categoria'])->names('categorias');
//Route::resource('categorias', CategoriaController::class);
Route::resource('cat', CategoriaController::class)->parameters(['cat' => 'categoria'])->names('categorias');
Route::resource('aut', AutoreController::class)->parameters(['aut' => 'autore'])->names('autores');
Route::resource('lib', LibroController::class)->parameters(['lib' => 'libro'])->names('libros');
Route::resource('coment', ComentarioController::class)->parameters(['coment' => 'comentario'])->names('comentarios');
Route::resource('buscar', BusquedaController::class)->parameters(['buscar' => 'busqueda'])->names('busquedas');