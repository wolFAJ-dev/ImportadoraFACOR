<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/views.css') }}">
    <title>Ver Ventas</title>
</head>
<body>
    <div class="container">
    <h1>Venta #{{ $venta->id }}</h1>

    <p><strong>Fecha:</strong> {{ $venta->fecha }}</p>
    <p><strong>Vendedor:</strong> {{ $venta->vendedor->nombre ?? 'Sin vendedor' }}</p>

    <table border="1">
        <thead>
            <tr>
                <th>producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venta->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->modelo ?? 'Producto' }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
                    <td>${{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total: ${{ number_format($venta->total, 2) }}</h3>
</div>
<div class="return">
    <a href="{{ route('ventas.index') }}" class="btn btn-primary">Regresar</a>
</div>
</body>
</html>
