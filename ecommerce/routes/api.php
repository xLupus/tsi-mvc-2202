<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [App\Http\Controllers\APIController::class, 'login']);
Route::get('logout', [App\Http\Controllers\APIController::class, 'logout']);

Route::group( ['middleware' => 'auth.jwt', 'prefix' => 'v1'], static function () {
    Route::post('/vendedores', [App\Http\Controllers\VendedoresApiController::class, 'store']);
    Route::get('/vendedores', [App\Http\Controllers\VendedoresApiController::class, 'index']);
    Route::get('/vendedores/{id}', [App\Http\Controllers\VendedoresApiController::class, 'show']);
    Route::put('/vendedores/{id}', [App\Http\Controllers\VendedoresApiController::class, 'update']);
    Route::delete('/vendedores/{id}', [App\Http\Controllers\VendedoresApiController::class, 'destroy']);

    Route::post('/produtos', [App\Http\Controllers\ProdutosApiController::class, 'store']);
    Route::get('/produtos', [App\Http\Controllers\ProdutosApiController::class, 'index']);
    Route::get('/produtos/{id}', [App\Http\Controllers\ProdutosApiController::class, 'show']);
    Route::put('/produtos/{id}', [App\Http\Controllers\ProdutosApiController::class, 'update']);
    Route::delete('/produtos/{id}', [App\Http\Controllers\ProdutosApiController::class, 'destroy']);

    Route::post('/clientes', [App\Http\Controllers\ClientesApiController::class, 'store']);
    Route::get('/clientes', [App\Http\Controllers\ClientesApiController::class, 'index']);
    Route::get('/clientes/{id}', [App\Http\Controllers\ClientesApiController::class, 'show']);
    Route::put('/clientes/{id}', [App\Http\Controllers\ClientesApiController::class, 'update']);
    Route::delete('/clientes/{id}', [App\Http\Controllers\ClientesApiController::class, 'destroy']);
});
