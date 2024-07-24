<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('api')->group(function () {
    Route::apiResource('fornecedores', FornecedorController::class);
});
Route::apiResource('fornecedores', FornecedorController::class);
Route::get('/fornecedores', [FornecedorController::class, 'index']);
Route::post('/fornecedores', [FornecedorController::class, 'store']);
Route::get('/fornecedores/{id}', [FornecedorController::class, 'show']);
Route::put('/fornecedores/{id}', [FornecedorController::class, 'update']);
Route::delete('/fornecedores/{id}', [FornecedorController::class, 'destroy']);
Route::get('/fornecedores/cnpj/{cnpj}', [FornecedorController::class, 'buscaCNPJ']);
