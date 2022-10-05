<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedoresController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('/clientes', App\Http\Controllers\ClienteController::class)->middleware(['auth']);
Route::resource('/vendedores', App\Http\Controllers\VendedoresController::class)->middleware(['auth']);
Route::resource('/produtos', App\Http\Controllers\ProdutoController::class)->middleware(['auth']);
