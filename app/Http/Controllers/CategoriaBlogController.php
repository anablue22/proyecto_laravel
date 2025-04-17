<?php

namespace App\Http\Controllers;

use Illuminate\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoriaBlog;

class CategoriaBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoria = CategoriaBlog::all();
        return view('blog.articulos.categorias.index', compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.articulos.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre'
        ]);

        CategoriaBlog::create($request->all());
        return redirect()->route('categorias.index')->width('success', 'categoría creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) //detalles de una sola categoría de productos//
    {
        $categoria = CategoriaBlog::findOrFail($id);
        return view('blog.articulos.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = CategoriaBlog::findOrFail($id);
        return view('blog.articulos.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre,' . $id
        ]);

        $categoria = CategoriaBlog::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = CategoriaBlog::findOrfail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'categoría eliminada correctamente');
    }
}
