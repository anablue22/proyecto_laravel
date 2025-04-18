@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Categorías de Productos</h1>

    <a href="{{ url('/productos/categorias/create') }}" class="btn btn-primary mb-3">Crear Nueva Categoría</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre de la Categoría</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection