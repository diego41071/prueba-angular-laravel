<!-- resources/views/productos/create.blade.php -->
<h1>Agregar Producto</h1>

<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>
    <div>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required>
    </div>
    <div>
        <label for="categorias">Categorías:</label>
        <select name="categorias[]" id="categorias" multiple required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Agregar Producto</button>
</form>
