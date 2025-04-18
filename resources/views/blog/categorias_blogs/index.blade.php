@extends('layouts.app')
@section('title', 'Categorias blogs')


@section('content')
<div>
    @if (session('success'))
        <p>{{session('success')}}</p>
    @endif
</div>
<div class="container">
    <h1>Listado de Categorías de Blogs</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                    <a href="{{ route('categorias.blogs.edit', $categoria->id)}}">Editar</a>
                    <form action="{{ route('categorias.blogs.destroy', $categoria->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
