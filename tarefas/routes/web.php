<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rotas do perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para tarefas e categorias (CRUD completo)
    Route::resource('tarefas', TarefaController::class);
    Route::resource('categorias', CategoriaController::class);
});

require __DIR__.'/auth.php';
