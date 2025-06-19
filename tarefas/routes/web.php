<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rota raiz: redireciona para login ou home conforme autenticação
Route::get('/', function () {
    return Auth::check() ? redirect()->route('home') : redirect()->route('login');
});

// Página inicial após login
Route::middleware('auth')->get('/home', function () {
    return view('home');
})->name('home');

// Grupo de rotas protegido por autenticação
Route::middleware('auth')->group(function () {

    // Dashboard (opcional)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas de perfil de usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas principais do sistema (CRUD completo)
    Route::resource('tarefas', TarefaController::class);
    Route::resource('categorias', CategoriaController::class)->except(['show']);
});

// Rotas de autenticação (login, registro, etc.)
require __DIR__.'/auth.php';


