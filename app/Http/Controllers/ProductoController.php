<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\CategoriaProducto; 

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Obtiene todos los productos
        return view('ecommerce.productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = CategoriaProducto::all();
        return view('ecommerce.productos.create', compact('categorias')); // Muestra el formulario de creación
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias_productos,id',
            'url_imagen' => 'required|string'
        ]);
    
        Producto::create($validated);
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('ecommerce.productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('ecommerce.productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias_productos,id',
            'url_imagen' => 'required|string'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}