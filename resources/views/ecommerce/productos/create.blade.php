@extends('layouts.app')
@section('title', 'Crear nuevo producto')

@section('content')
<div>
    @if (session('success'))
        <p>{{session('success')}}</p>
    @endif
</div>
<div>
<h1>Agregar nuevo producto</h1>
    <form action="{{ route('productos.store')}}" method="POST">
    @csrf
        <label for="nombre">Ingrese el nombre del producto</label>
        <input type="text" name="nombre">
        <label for="descripcion">Ingrese la descripción del producto</label>
        <textarea name="descripcion" cols="30" rows="10"></textarea>
        <input type="submit" value="Enviar datos">
    </form>
</div>
@endsection