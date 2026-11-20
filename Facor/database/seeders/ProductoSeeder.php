<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['modelo' => 'Master Technology',  'tamaño' => 'Imperial', 'medida' => '1.00mts X 1.90mts', 'precio' => 1000, 'stock' => 10],
            ['modelo' => 'Master Technology', 'tamaño' => 'Matrimonial', 'medida' => '1.40mts X 1.90mts', 'precio' => 1200, 'stock' => 30],
            ['modelo' => 'Caprilux', 'tamaño' => 'Queen', 'medida' => '1.60mts X 2.00mts', 'medida' => '1.60mts X 2.00mts', 'precio' => 1500, 'stock' => 20]
        ];
        foreach ($productos as $producto) {
            Producto::updateOrCreate(
            [
            'modelo' => $producto['modelo'],
            'tamaño' => $producto['tamaño'],
            'medida' => $producto['medida'],
            ],
            [
            'precio' => $producto['precio'],
            'stock' => $producto['stock'],
            ]
            );   
        }
    }
}