<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <div>
        <label for="nombre">Nombre del producto:</label>
        <input type="text" name="nombre" id="nombre" required>
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
    </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" id="precio" required>
    </div>
    <div>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" required>
    </div>
    <div>
        <label for="categoria_id">Categoría:</label>
    <select name="categoria_id" id="categoria_id" required>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
        </select>
    </div>
    <div>
        <label for="url_imagen">URL de la imagen:</label>
        <input type="text" name="url_imagen" id="url_imagen" required>
    </div>
    <button type="submit">Enviar datos</button>
</form>