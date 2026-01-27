<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('faltas', FaltaController::class);

Route::get('informe/diario', [InformeController::class, 'diario'])->name('informe.diario');
Route::get('informe/semanal', [InformeController::class, 'semanal'])->name('informe.semanal');