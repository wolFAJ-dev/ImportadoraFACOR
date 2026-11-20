<?php

use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// TEST VIEWS
//Route::get('/solo-admin', fn () => 'Bienvenido Admin') ->middleware(['auth', 'role:admin']);
//Route::get('/solo-vendedor', fn () => 'Bienvenido Vendedor') ->middleware(['auth', 'role:vendedor']);

//AMDIN route
Route::resource('productos', ProductoController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'role:admin']);

Route::resource('productos', ProductoController::class)
    ->only(['index', 'show'])
    ->middleware(['auth', 'role:admin,vendedor']);

Route::resource('ventas', VentasController::class)
    ->middleware(['auth', 'role:admin,vendedor']);

require __DIR__.'/auth.php';
