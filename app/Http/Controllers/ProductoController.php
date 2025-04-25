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
            'imagen' => 'required|image' 
        ]);
    
         // Guardar la imagen y obtener la ruta
    $rutaImagen = $request->file('imagen')->store('productos', 'public');
    
    // Crear el nuevo producto con los datos validados
    $producto = new Producto();
    $producto->nombre = $validated['nombre'];
    $producto->descripcion = $validated['descripcion'];
    $producto->precio = $validated['precio'];
    $producto->stock = $validated['stock'];
    $producto->categoria_id = $validated['categoria_id'];
    $producto->url_imagen = $rutaImagen; // Guardar la ruta de la imagen
    $producto->save();
    
    return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
}
        
    

    public function show(Producto $producto)
    {
        return view('ecommerce.productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('ecommerce.productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:150',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias_productos,id',
            'imagen' => 'required|image|max:2048', // max 2MB
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->categoria_id = $request->categoria_id;
        $producto->imagen = file_get_contents($request->file('imagen')->getRealPath()); // guardar en binario
        $producto->save(); 
        
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}