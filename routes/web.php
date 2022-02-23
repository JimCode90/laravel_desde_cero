<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main');

//Route::resource('productos', ProductoController::class)->only(['index', 'show', 'create', 'edit']);
//Route::resource('productos', ProductoController::class)->except(['index']);

Route::get('/productos',[ProductoController::class, 'index'])->name('productos.index');

Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');

Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
//Route::get('/productos/{producto:title}', [ProductoController::class, 'show'])->name('productos.show');

Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');

Route::match(['put', 'patch'], '/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');

Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
