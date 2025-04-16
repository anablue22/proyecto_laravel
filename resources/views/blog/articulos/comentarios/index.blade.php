@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Comentarios</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Contenido</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Artículo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comentarios as $comentario)
                <tr>
                    <td>{{ $comentario->contenido }}</td>
                    <td>{{ $comentario->nombre_usuario }}</td>
                    <td>{{ $comentario->email }}</td>
                    <td>{{ $comentario->articulo->titulo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection