<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::middleware(['auth'])->group(function () {
//     Route::get('/tasks', [TodoController::class, 'index'])->name('tasks.index');
//     Route::get('/tasks/create', [TodoController::class, 'create'])->name('tasks.create');
//     Route::post('/tasks', [TodoController::class, 'store'])->name('tasks.store');
//     Route::get('/tasks/{task}/edit', [TodoController::class, 'edit'])->name('tasks.edit');
//     Route::put('/tasks/{task}', [TodoController::class, 'update'])->name('tasks.update');
//     Route::delete('/tasks/{task}', [TodoController::class, 'destroy'])->name('tasks.destroy');
// });

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TodoController::class);
});

require __DIR__.'/auth.php';
