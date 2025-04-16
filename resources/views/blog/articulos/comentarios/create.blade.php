@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Comentario</h1>

    <form action="{{ route('comentarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea name="contenido" id="contenido" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Nombre de usuario</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="articulo_id" class="form-label">Artículo</label>
            <select name="articulo_id" id="articulo_id" class="form-control" required>
                @foreach ($articulos as $articulo)
                    <option value="{{ $articulo->id }}">{{ $articulo->titulo }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Comentario</button>
    </form>
</div>
@endsection