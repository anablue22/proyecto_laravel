<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\CategoriaBlogController;
use App\Http\Controllers\Auth\LoginController;


//Ruta para la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
}); 

// Ruta al índice de artículos del blog
Route::get('/blog/articulos', [ArticuloController::class, 'index']);

            //CATEGORIAS DE BLOGS
Route::get('/blog/categorias-blogs-nueva-categoria', [CategoriaBlogController::class, 'create'])->name('categorias.blogs.create');
Route::post('/blog/categorias-blogs-nueva-categoria-store', [CategoriaBlogController::class, 'store'])->name('categorias.blogs.store');
Route::get('/blog/categorias-blogs', [CategoriaBlogController::class, 'index'])->name('categorias.blogs.index');
Route::get('/blog/categorias-blogs-editar-{id}', [CategoriaBlogController::class, 'edit'])->name('categorias.blogs.edit');
Route::put('/blog/categorias-blogs-editar-{id}-cargando', [CategoriaBlogController::class, 'update'])->name('categorias.blogs.update');
Route::delete('/blog/categorias-blogs-{id}-eliminar', [CategoriaBlogController::class, 'destroy'])->name('categorias.blogs.destroy');


            //COMENTARIOS
Route::get('/blog/articulos/comentarios', [ComentarioController::class, 'index'])->name('comentarios.blogs.index');
Route::get('/blog/articulos/comentarios/create', [ComentarioController::class, 'create'])->name('comentarios.blogs.create');
Route::post('/blog/articulos/comentarios', [ComentarioController::class, 'store'])->name('comentarios.blogs.store');
Route::get('/blog/articulos/comentarios/{comentario}/edit', [ComentarioController::class, 'edit'])->name('comentarios.blogs.edit');
Route::put('/blog/articulos/comentarios/{comentario}', [ComentarioController::class, 'update'])->name('comentarios.blogs.update');
        
                // PRODUCTOS 
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

            // Ruta para el login

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();