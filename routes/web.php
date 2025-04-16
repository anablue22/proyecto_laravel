<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\CategoriaBlogController;


//Ruta para la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
}); 

// Ruta al índice de artículos del blog
Route::get('/blog/articulos', [ArticuloController::class, 'index']);

//Categorias
Route::get('/blog/categorias-nueva-categoria', [CategoriaBlogController::class, 'create'])->name('categoria.create');
Route::post('/blog/categorias-nueva-categoria-store', [CategoriaBlogController::class, 'store'])->name('categoria.store');  

// Ruta al formulario para crear un comentario
Route::get('/blog/articulos/comentarios/create', [ComentarioController::class, 'create']);

// Ruta al índice de productos del e-commerce
Route::get('/ecommerce/productos', [ProductoController::class, 'index']);

// Ruta al índice de categorías del e-commerce
Route::get('/ecommerce/categorias', [CategoriaBlogController::class, 'index']);
