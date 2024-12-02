<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PropriedadeController;
use App\Http\Controllers\TalhaoController;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\PlantioController;
use App\Http\Controllers\RelatoriosController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario');
    Route::get('/cadastro', [UsuarioController::class, 'cadastro']);
    Route::post('/save', [UsuarioController::class, 'save']);
    Route::get('/remove', [UsuarioController::class, 'remove']);
});

Route::prefix('propriedade')->group(function () {
    Route::get('/', [PropriedadeController::class, 'index'])->name('propriedade');
    Route::get('/cadastro', [PropriedadeController::class, 'cadastro']);
    Route::post('/save', [PropriedadeController::class, 'save']);
    Route::get('/remove', [PropriedadeController::class, 'remove']);
});

Route::prefix('talhao')->group(function () {
    Route::get('/', [TalhaoController::class, 'index'])->name('talhao');
    Route::get('/cadastro', [TalhaoController::class, 'cadastro']);
    Route::post('/save', [TalhaoController::class, 'save']);
    Route::get('/remove', [TalhaoController::class, 'remove']);
});

Route::prefix('cultivo')->group(function () {
    Route::get('/', [CultivoController::class, 'index'])->name('cultivo');
    Route::get('/cadastro', [CultivoController::class, 'cadastro']);
    Route::post('/save', [CultivoController::class, 'save']);
    Route::get('/remove', [CultivoController::class, 'remove']);
});

Route::prefix('plantio')->group(function () {
    Route::get('/', [PlantioController::class, 'index'])->name('plantio');
    Route::get('/cadastro', [PlantioController::class, 'cadastro']);
    Route::post('/save', [PlantioController::class, 'save']);
    Route::get('/remove', [PlantioController::class, 'remove']);
});

Route::prefix('relatorios')->group(function () {
    Route::get('/', [RelatoriosController::class, 'index'])->name('relatorios');
    Route::get('/cadastro', [RelatoriosController::class, 'cadastro']);
    Route::post('/save', [RelatoriosController::class, 'save']);
    Route::get('/remove', [RelatoriosController::class, 'remove']);
});
