<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaltaController;
use App\Http\Controllers\InformeController;

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
    
    // Rutas protegidas de faltas e informes
    Route::resource('faltas', FaltaController::class);
    Route::get('informe/diario', [InformeController::class, 'diario'])->name('informe.diario');
    Route::get('informe/semanal', [InformeController::class, 'semanal'])->name('informe.semanal');
    Route::resource('informes', InformeController::class);
});

require __DIR__.'/auth.php';
