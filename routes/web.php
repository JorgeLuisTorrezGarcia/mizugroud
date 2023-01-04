<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CarteleraController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('ventas',VentasController::class)->names('ventas');
    Route::resource('clientes',ClienteController::class)->names('clientes');
    Route::resource('horarios',HorarioController::class)->names('horarios');
    Route::resource('categorias',CategoriaController::class)->names('categorias');
    Route::resource('peliculas',PeliculaController::class)->names('peliculas');
    Route::resource('users',UserController::class)->only(['index','edit','update'])->names('users');
    Route::resource('roles',RoleController::class)->names('roles');
    Route::resource('bitacoras',BitacoraController::class)->only('index')->names('bitacoras');
    Route::resource('carteleras',CarteleraController::class)->only('index')->names('carteleras');
});

Route::get('ventas/pdf/{venta}',[VentasController::class,'pdf'])->name('ventas.pdf');






require __DIR__.'/auth.php';
