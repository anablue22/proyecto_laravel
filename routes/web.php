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


            //COMENTARIOS
// Mostrar todos los comentarios
Route::get('/blog/articulos/comentarios', [ComentarioController::class, 'index'])->name('comentarios.blogs.index');

// Mostrar el formulario de crear un comentario
Route::get('/blog/articulos/comentarios/create', [ComentarioController::class, 'create'])->name('comentarios.blogs.create');

// Guardar el nuevo comentario
Route::post('/blog/articulos/comentarios', [ComentarioController::class, 'store'])->name('comentarios.blogs.store');

// Mostrar el formulario de editar un comentario
Route::get('/blog/articulos/comentarios/{comentario}/edit', [ComentarioController::class, 'edit'])->name('comentarios.blogs.edit');

// Actualizar el comentario
Route::put('/blog/articulos/comentarios/{comentario}', [ComentarioController::class, 'update'])->name('comentarios.blogs.update');

                // PRODUCTOS 
// Mostrar todos los productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

// Mostrar el formulario de crear un producto
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');

// Guardar el nuevo producto
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');

// Mostrar un producto específico
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');

// Mostrar el formulario de editar un producto
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

// Actualizar el producto
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');

// Eliminar un producto
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
 
