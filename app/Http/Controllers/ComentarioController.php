<?php

namespace App\Http\Controllers;

use Illuminate\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentario = Comentario::all();
        return view('blog.articulos.comentarios.index', compact('comentario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.articulos.comentarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|unique:comentarios, contenido'
        ]);

        Comentario::create($request->all());
        return redirect()->route('comentarios.index')->with('success', 'comentario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)//detalles de cada comentario
    {
        $comentario = Comentario::findOrFail($id);
        return view('blog.articulos.comentarios.show', compact('comentario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comentario = Comentario::findOrFail($id);
        return view('blog.articulos.comentarios.edit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'contenido' => 'required|unique:comentarios,contenido,' . $id
        ]);

        $comentario = Comentario::findOrFail($id);
        $comentario->update($request->all());

        return redirect()->route('comentarios.index')->with('success', 'comentario actualizao correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comentario = Comentario::findOrfail($id);
        $comentario->delete();
        return redirect()->route('comentarios.index')->with('success', 'comenatrio eliminado correctamente');
    }
}