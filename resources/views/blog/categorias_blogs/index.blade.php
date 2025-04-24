@extends('layouts.app')

@section('title', 'Listado de Categorías de Blogs')

@section('content')
<div class="container">
    <h1>Listado de Categorías de Blogs</h1>

    <div class="mb-4">
        <a href="{{ route('categorias.blogs.create') }}" class="btn btn-primary">
            Crear Nueva Categoría
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            </a>
                            <a href="{{ route('categorias.blogs.edit', $categoria->id) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>
                            <form action="{{ route('categorias.blogs.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de querer eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection