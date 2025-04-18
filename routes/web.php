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

            //CATEGORIAS DE BLOGS
//muestra la vista del formulario
Route::get('/blog/categorias-blogs-nueva-categoria', [CategoriaBlogController::class, 'create'])->name('categorias.blogs.create');
//maneja la logica para la creacion del registro
Route::post('/blog/categorias-blogs-nueva-categoria-store', [CategoriaBlogController::class, 'store'])->name('categorias.blogs.store'); 
//muestra todos los registros
Route::get('/blog/categorias-blogs', [CategoriaBlogController::class, 'index'])->name('categorias.blogs.index');
//muestra el formulario de edicion
Route::get('/blog/categorias-blogs-editar-{id}', [CategoriaBlogController::class, 'edit'])->name('categorias.blogs.edit');
//maneja la logica para la actualizacion
Route::put('/blog/categorias-blogs-editar-{id}-cargando', [CategoriaBlogController::class, 'update'])->name('categorias.blogs.update');
//elimina el registro
Route::delete('/blog/categorias-blogs-{id}-eliminar', [CategoriaBlogController::class, 'destroy'])->name('categorias.blogs.destroy');


// Ruta al formulario para crear un comentario
Route::get('/blog/articulos/comentarios/create', [ComentarioController::class, 'create']);

// Ruta al índice de productos del e-commerce
Route::get('/ecommerce/productos', [ProductoController::class, 'index']);

// Ruta al índice de categorías del e-commerce
Route::get('/ecommerce/categorias', [CategoriaBlogController::class, 'index']);
