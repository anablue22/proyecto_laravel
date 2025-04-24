@extends('layouts.app')

@section('title', 'Detalle del producto')

@section('content')
<div class="container mx-auto mt-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold text-blue-600 mb-4">{{ $producto->nombre }}</h2>

        <div class="mb-2">
            <strong class="text-gray-700">Precio:</strong>
            <span>${{ number_format($producto->precio, 2) }}</span>
        </div>

        <div class="mb-2">
            <strong class="text-gray-700">Categoría:</strong>
            <span>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</span>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Descripción:</strong>
            <p class="text-gray-800">{{ $producto->descripcion }}</p>
        </div>

        <a href="{{ route('productos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
    </div>
</div>
@endsection

