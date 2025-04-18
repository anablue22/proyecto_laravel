@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Productos</h1>

    <a href="{{ url('/productos/create') }}" class="btn btn-primary mb-3">Crear Nuevo Producto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection