<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>
<body>
    <h1>Categorías</h1>
    
    <a href="{{ route('categorias.create') }}">Crear Nueva Categoría</a>

    <ul>
        @foreach($categorias as $categoria)
            <li>{{ $categoria->nombre }}</li>
        @endforeach
    </ul>
</body>
</html>
