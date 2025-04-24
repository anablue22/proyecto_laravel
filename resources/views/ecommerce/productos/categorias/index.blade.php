<table class="table-auto w-full">
    <thead>
        <tr>
            <th>Nombre del Producto</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Descripción</th>
            <th>Acciones</th> <!-- Nueva columna -->
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td class="flex space-x-2">
                    <!-- Ver -->
                    <a href="{{ route('productos.show', $producto->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Ver</a>

                    <!-- Editar -->
                    <a href="{{ route('productos.edit', $producto->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>

                    <!-- Eliminar -->
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
