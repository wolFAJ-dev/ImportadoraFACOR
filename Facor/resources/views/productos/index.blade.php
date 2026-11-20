<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/views.css') }}">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.create') }}">Crear Producto</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Tamaño</th>
                <th>Medida</th>
                <th>Precio</th>
                <th>Stock</th>
                @if(auth()->user()->role === 'admin')
                <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->modelo }}</td>
                    <td>{{ $producto->tamaño }}</td>
                    <td>{{ $producto->medida }}</td>
                    <td>Q{{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    @if(auth()->user()->role === 'admin')
                    <td>
                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="return">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Regresar</a>
    </div>
</body>
</html>