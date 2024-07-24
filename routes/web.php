<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas do Fornecedor usando o controlador
Route::resource('fornecedores', FornecedorController::class);

// Rota adicional
Route::get('/about', function () {
    return view('about');
});

