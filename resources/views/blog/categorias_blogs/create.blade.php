<div>
    @if (session('mensaje'))
        <p>{{session('mensaje')}}</p>
    @endif
</div>
<div>
    <form action="{{ route('categoria.store')}}" method="post">
    @csrf
        <label for="nombre">Ingrese el nombre de la categoría</label>
        <input type="text" name="nombre">
        <label for="descripcion">Ingrese la descripción</label>
        <textarea name="descripcion" cols="30" rows="10"></textarea>
        <input type="submit" value="Enviar datos">
    </form>
</div>