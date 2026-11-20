<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\Vendedor;
use App\Models\ventas;
use App\Models\registroventas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class VentasSeeder extends Seeder
{
    public function run(): void
    {
        $vendedor = Vendedor::first();
        $productos = Producto::take(1)->get();

        if (! $vendedor) {
            throw new RuntimeException(
                'No hay vendedores; revisa VendedorSeeder.'
            );
        }

        if ($productos->isEmpty()) {
            throw new RuntimeException(
                'No hay productos; revisa ProductoSeeder.'
            );
        }

        DB::transaction(function () use ($vendedor, $productos) {
            $venta = ventas::create([
                'vendedor_id' => $vendedor->id,
                'fecha' => now()->toDateString(),
            ]);

            foreach ($productos as $producto) {
                $venta->detalles()->create([
                    'producto_id' => $producto->id,
                    'cantidad' => 1,
                    'precio_unitario' => $producto->precio,
                ]);
            }
        });
    }
}