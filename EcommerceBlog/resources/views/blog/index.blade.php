@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Listado de Comentarios</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Contenido</th>
                <th>Nombre de Usuario</th>
                <th>Email</th>
                <th>Artículo</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comentarios as $comentario)
                <tr>
                    <td>{{ $comentario->id }}</td>
                    <td>{{ $comentario->contenido }}</td>
                    <td>{{ $comentario->nombre_usuario }}</td>
                    <td>{{ $comentario->email }}</td>
                    <td>{{ $comentario->articulo->titulo ?? 'Sin artículo' }}</td>
                    <td>{{ $comentario->created_at }}</td>
                    <td>
                        {{-- Aquí se pueden agregar botones de editar o eliminar --}}
                        <a href="#" class="btn btn-primary btn-sm">Editar</a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection