<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría</title>
</head>
<body>
    <h1>Crear Nueva Categoría</h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre de la categoría:</label>
        <input type="text" name="nombre" id="nombre" required>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
