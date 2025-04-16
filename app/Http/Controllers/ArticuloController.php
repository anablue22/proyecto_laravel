<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $articulo =Articulo::all();
        return view('ecommerce.articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ecommerce.articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|unique:articulos,titulo'
        ]);

        Articulo::create($request->all());
        return redirect()->route('articulos.index')->with('success', 'artículo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) //detalles de un solo artículo de productos//
    {
        $articulo = Articulo::findOrFail($id);
        return view('ecommerce.articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('ecommerce.articulos.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|unique:articulos,titulo,' . $id
        ]); 

        $articulo = Articulo::findOrFail($id);
        $articulo->update($request->all());

        return redirect()->route('articulos.index')->with('success', 'articulo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articulo = Articulo::findOrfail($id);
        $articulo->delete();
        return redirect()->route('articulos.index')->with('success', 'artículo eliminado correctamente');
    }
}