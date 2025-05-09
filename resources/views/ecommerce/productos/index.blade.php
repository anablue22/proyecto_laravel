@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de productos</h1>

    <a href="{{ url('/productos/create') }}" class="btn btn-primary mb-3">Crear Nuevo Producto</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
<tr>
    <td>
        @if ($producto->url_imagen)
            <img src="{{ asset($producto->url_imagen) }}" alt="Imagen" width="80" height="80" style="object-fit: cover;">
        @else
            <span>Sin imagen</span>
        @endif
    </td>
    <td>{{ $producto->nombre }}</td>
    <td>${{ number_format($producto->precio, 2) }}</td>
    <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
    <td>{{ $producto->descripcion }}</td>
    <td>
        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver</a>
        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </td>
    </tr>
    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection