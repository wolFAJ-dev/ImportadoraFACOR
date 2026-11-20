<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/views.css') }}">
    <title>Ventas</title>
</head>
<body>
    <div class="container">
    <h1>Ventas</h1>

    <a href="{{ route('ventas.create') }}" class="btn btn-primary">Nueva venta</a>

    <form action="{{ route('ventas.index') }}" method="GET">
        <label for="mes">Filtrar por mes:</label>
        <input type="month" id="mes" name="mes" value="{{ $mes }}">
        <button type="submit">Filtrar</button>
        <a href="{{ route('ventas.index') }}">Quitar filtro</a>
    </form>

    <p>Ventas encontradas: {{ $ventas->count() }}</p>
    <p>Total vendido: ${{ number_format($totalVentas, 2) }}</p>

    <table class="table table-striped mt-3" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Vendedor</th>
                <th>Productos</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->fecha }}</td>
                    <td>{{ $venta->vendedor->nombre ?? 'Sin vendedor' }}</td>
                    <td>
                        @foreach ($venta->detalles as $detalle)
                            {{ $detalle->producto->nombre ?? 'Producto' }} x {{ $detalle->cantidad }}<br>
                        @endforeach
                    </td>
                    <td>${{ number_format($venta->total, 2) }}</td>
                    <td>
                        <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('alerta_stock_bajo'))
    <div class="alert alert-warning">
        <strong>Alerta de stock bajo:</strong>
        {{ session('alerta_stock_bajo') }}
    </div>
@endif
<div class="return">
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Regresar</a>
</div>
</body>
</html>