@extends('layouts.app')
@section('title', 'Editar categorias blogs')

@section('content')
<div>
    @if (session('success'))
        <p>{{session('success')}}</p>
    @endif
</div>
<div>
<h1>Editar categoria de blog</h1>
    <form action="{{ route('categorias.blogs.update', $categoria->id)}}" method="POST">
    @csrf
    @method('PUT')
        <label for="nombre">Nombre de la categoría</label>
        <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}">
        <label for="descripcion">Descripción de la categoria</label>
        <textarea name="descripcion" cols="30" rows="10" >{{ old('descripcion', $categoria->descripcion)}}</textarea>
        <input type="submit" value="Enviar datos">
    </form>
</div>
@endsection