@extends('layouts.app')
@section('title', 'Editar comentarios')

@section('content')
<div>
    @if (session('succes'))
        <p>{{session('success')}}</p>
    @endif
</div>
<div>
    <h1>Editar comentario</h1>
    <form action="{{ route('comentarios.blogs.update', $comentario->id)}}" method="POST">
    @csrf
    @method('PUT')
        <label for="nombre">Nombre de Usuario</label>
        <input type="text" name="nombre" value="{{ old('nombre', $comentario->nombre) }}">
        <label for="descripcion">Descripción del comentario</label>
        <textarea name="descripcion" cols="30" rows="10" >{{ old('descripcion', $comentario->descripcion)}}</textarea>
        <input type="submit" value="Actualizar datos">
    </form>
</div>
@endsection