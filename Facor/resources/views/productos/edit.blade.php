<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/views.css') }}">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="{{ $producto->modelo }}" required>
        <br>
        <label for="tamaño">Tamaño:</label>
        <input type="text" name="tamaño" id="tamaño" value="{{ $producto->tamaño }}" required>
        <br>
        <br>
        <label for="medida">Medida:</label>
        <input type="text" name="medida" id="medida" value="{{ $producto->medida }}" step="0.01" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" step="0.01" required>
        <br>
        <br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="{{ $producto->stock }}" step="0.01" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <div class="return">
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Regresar</a>
    </div>
</body>
</html>