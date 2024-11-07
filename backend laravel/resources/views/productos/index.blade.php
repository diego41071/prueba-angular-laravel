<!-- resources/views/productos/index.blade.php -->
<h1>Listado de Productos</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<a href="{{ route('productos.create') }}">Agregar Producto</a>
<a href="{{ route('categorias.create') }}">Agregar Categoría</a>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>
                @foreach($producto->categorias as $categoria)
                        {{ $categoria->nombre }}@if(!$loop->last), @endif
                    @endforeach                </td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
