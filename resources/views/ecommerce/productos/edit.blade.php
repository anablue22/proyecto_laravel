@extends('layouts.app')
@section('title', 'Editar producto')

@section('content')
<div>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>
<div>
    <h1>Editar producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="nombre">Nombre del producto</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}">

        <label for="descripcion">Descripción del producto</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10">{{ old('descripcion', $producto->descripcion) }}</textarea>

        <input type="submit" value="Actualizar datos">
    </form>
</div>
@endsection
