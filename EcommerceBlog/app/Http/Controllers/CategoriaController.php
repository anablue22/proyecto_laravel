<?php

namespace App\Http\Controllers;

use Illuminate\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('ecommerce.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ecommerce.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre'
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index')->width('con éxito', 'categoría creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) //detalles de una sola categoría de productos//
    {
        $categoria = Categoria::findOrFail($id);
        return view('ecommerce.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('ecommerce.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->Validate([
            'nombre' => 'required|Unique:categorias,nombre,' . $id
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('con éxito', 'categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrfail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('con éxito', 'categoría eliminada correctamente');
    }
}
