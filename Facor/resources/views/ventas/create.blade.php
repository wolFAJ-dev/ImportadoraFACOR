<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/views.css') }}">
    <title>Crear Venta</title>
</head>
<body>
    <div class="container">
    <h1>Nueva venta</h1>

    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="vendedor_id">Vendedor</label>
            <select name="vendedor_id" id="vendedor_id" class="form-control" required>
                <option value="">Selecciona un vendedor</option>
                @foreach ($vendedores as $vendedor)
                    <option value="{{ $vendedor->id }}">{{ $vendedor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <h3>Productos</h3>

        @foreach ($productos as $producto)
            <div class="border p-2 mb-2">
                <label>
                    <input type="checkbox" name="productos[{{ $producto->id }}][seleccionado]" value="1">
                    {{ $producto->id }} - {{ $producto->modelo }} - {{ $producto->tamaño }} - ${{ number_format($producto->precio, 2) }}
                </label>

                <div class="mt-2">
                    <label>Cantidad</label>
                    <input
                        type="number"
                        name="productos[{{ $producto->id }}][cantidad]"
                        min="1"
                        value="1"
                        class="form-control"
                        style="max-width: 120px;"
                    >
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Guardar venta</button>
    </form>
</div>
<div class="return">
        <a href="{{ route('ventas.index') }}" class="btn btn-primary">Regresar</a>
    </div>
</body>
</html>