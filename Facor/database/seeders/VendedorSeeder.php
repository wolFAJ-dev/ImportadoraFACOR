<?php

namespace Database\Seeders;

use App\Models\Vendedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendedor::updateOrCreate([
            'nombre' => 'Juan Pérez',
        ], [
            'telefono' => '123456789',
            'email' => 'juan.perez@example.com'
        ]);
        Vendedor::updateOrCreate([
            'nombre' => 'Pedro Gómez',
        ], [
            'telefono' => '987654321',
            'email' => 'pedro.gomez@example.com'
        ]);
        Vendedor::updateOrCreate([
            'nombre' => 'María López',
        ], [
            'telefono' => '555555555',
            'email' => 'maria.lopez@example.com'
        ]);
    }
}
