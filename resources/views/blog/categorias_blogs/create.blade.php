@extends('layouts.app')
@section('title', 'Agregar nueva categorias blogs')

@section('content')
<div>
    @if (session('success'))
        <p>{{session('success')}}</p>
    @endif
</div>
<div>
<h1>Agregar nueva categoria de blog</h1>
    <form action="{{ route('categorias.blogs.store')}}" method="POST">
    @csrf
        <label for="nombre">Ingrese el nombre de la categoría</label>
        <input type="text" name="nombre">
        <label for="descripcion">Ingrese la descripción</label>
        <textarea name="descripcion" cols="30" rows="10"></textarea>
        <input type="submit" value="Enviar datos">
    </form>
</div>
@endsection