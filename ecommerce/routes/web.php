<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedoresController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

/*
Route::resource('/clientes', App\Http\Controllers\ClienteController::class)->middleware(['auth']);
Route::resource('/vendedores', App\Http\Controllers\VendedoresController::class)->middleware(['auth']);
Route::resource('/produtos', App\Http\Controllers\ProdutoController::class)->middleware(['auth']);
*/

Route::group( ['middleware' => ['auth'] ], function() {
    Route::resource('/clientes', App\Http\Controllers\ClienteController::class);
    Route::resource('/vendedores', App\Http\Controllers\VendedoresController::class);
    Route::resource('/produtos', App\Http\Controllers\ProdutoController::class);
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/roles', App\Http\Controllers\RoleController::class);
});
