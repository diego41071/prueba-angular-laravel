<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Esto es importante para enviar una petición PUT en lugar de POST -->

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
    </div>

    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
    </div>

    <div class="form-group">
        <label for="categorias">Categorías</label>
        <select name="categorias[]" id="categorias" multiple>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" 
                    @if(in_array($categoria->id, $producto->categorias->pluck('id')->toArray())) selected @endif>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Actualizar</button>
</form>
