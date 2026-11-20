<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/views.css') }}">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <title>Document</title>
</head>
<body>
    <h1>Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div>
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" required>
        </div>
        <div>
            <label for="tamaño">Tamaño:</label>
            <input type="text" name="tamaño" id="tamaño" required>
        </div>
        <div>
            <label for="medida">Medida:</label>
            <input type="text" name="medida" id="medida" required>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" step="0.01" required>
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" required>
        </div>
        <button type="submit">Crear Producto</button>
    </form>
    <div class="return">
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Regresar</a>
    </div>
</body>
</html>