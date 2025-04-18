<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaBlogRequest;
use Illuminate\Http\Controllers;
use App\Models\CategoriaBlog;

class CategoriaBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = CategoriaBlog::all();
        
        return view('blog.categorias_blogs.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.categorias_blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaBlogRequest $request)
    {

        CategoriaBlog::create($request->all());

        return redirect()->route('categorias.blogs.create')->with('success', 'categoría creada correctamente');
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
    public function edit($id)
    {
        $categoria = CategoriaBlog::findOrFail($id);
       
        return view('blog.categorias_blogs.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaBlogRequest $request, $id)
    {

        $categoria = CategoriaBlog::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.blogs.index')->with('success', 'categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = CategoriaBlog::findOrfail($id);
        $categoria->delete();
        return redirect()->route('categorias.blogs.index')->with('success', 'categoría eliminada correctamente');
    }
}
