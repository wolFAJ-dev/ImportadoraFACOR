<?php

namespace App\Http\Controllers;

use App\Models\ventas;
use App\Models\registroventas;
use App\Models\Producto;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VentasController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
        'mes' => 'nullable|date_format:Y-m',
    ]);

    $mes = $request->input('mes');

    $consulta = ventas::with(['detalles.producto', 'vendedor'])
        ->orderBy('created_at', 'desc');

    if ($mes) {
        [$anio, $numeroMes] = explode('-', $mes);

        $consulta->whereYear('fecha', $anio)
            ->whereMonth('fecha', $numeroMes);
    }

    $ventas = $consulta->get();

    $totalVentas = $ventas->sum(function ($venta) {
        return $venta->detalles->sum(function ($detalle) {
            return $detalle->cantidad * $detalle->precio_unitario;
        });
    });

    return view('ventas.index', compact('ventas', 'totalVentas', 'mes'));
    }

    public function create()
    {
        $productos = Producto::all();
        $vendedores = Vendedor::all();

        return view('ventas.create', compact('productos', 'vendedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'vendedor_id' => 'required|exists:vendedor,id',
        'productos' => 'nullable|array',
        'productos.*.seleccionado' => 'nullable|boolean',
        'productos.*.cantidad' => 'nullable|integer|min:1',
    ]);

    $hayProductos = false;

    foreach ($request->productos ?? [] as $productoId => $data) {
        if (!empty($data['seleccionado'])) {
            $hayProductos = true;

            $producto = Producto::findOrFail($productoId);
            $cantidad = (int) ($data['cantidad'] ?? 0);

            if ($cantidad > $producto->stock) {
                return back()->withErrors([
                    'productos' => "No hay suficiente stock de {$producto->modelo}. Disponible: {$producto->stock}.",
                ])->withInput();
            }
        }
    }

    if (!$hayProductos) {
        return back()->withErrors([
            'productos' => 'Selecciona al menos un producto.',
        ])->withInput();
    }

    $venta = new ventas();
    $venta->vendedor_id = $request->input('vendedor_id');
    $venta->fecha = now()->toDateString();
    $venta->save();

    foreach ($request->productos as $productoId => $data) {
        if (!empty($data['seleccionado'])) {
            $producto = Producto::findOrFail($productoId);
            $cantidad = (int) $data['cantidad'];

            $detalle = new registroventas();
            $detalle->venta_id = $venta->id;
            $detalle->producto_id = $producto->id;
            $detalle->cantidad = $cantidad;
            $detalle->precio_unitario = $producto->precio;
            $detalle->save();

            $producto->stock = $producto->stock - $cantidad;
            $producto->save();

            if ($producto->stock <= 5) {
                session()->flash('alerta_stock_bajo', "{$producto->modelo} queda con {$producto->stock} unidades");
            }
        }
    }

    return redirect()->route('ventas.index')
        ->with('success', 'Venta registrada correctamente.');
    }

    public function show(ventas $venta)
    {
        $venta->load(['detalles.producto', 'vendedor']);

        return view('ventas.show', compact('venta'));
    }

    public function edit(ventas $venta)
    {
        $venta->load(['detalles.producto', 'vendedor']);
        $productos = Producto::all();
        $vendedores = Vendedor::all();

        return view('ventas.edit', compact('venta', 'productos', 'vendedores'));
    }

    public function update(Request $request, ventas $venta)
    {
        $request->validate([
            'vendedor_id' => 'required|exists:vendedor,id',
        ]);

        $venta->update([
            'vendedor_id' => $request->vendedor_id,
            'fecha' => now()->toDateString(),
        ]);

        $venta->detalles()->delete();

        if ($request->productos) {
            foreach ($request->productos as $productoId => $data) {
                $seleccionado = $data['seleccionado'] ?? false;
                $cantidad = (int) ($data['cantidad'] ?? 0);

                if ($seleccionado && $cantidad > 0) {
                    $producto = Producto::findOrFail($productoId);

                    registroventas::create([
                        'venta_id' => $venta->id,
                        'producto_id' => $producto->id,
                        'cantidad' => $cantidad,
                        'precio_unitario' => $producto->precio,
                    ]);
                }
            }
        }

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada.');
    }

    public function destroy(ventas $venta)
    {
        $venta->detalles()->delete();
        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada.');
    }
}