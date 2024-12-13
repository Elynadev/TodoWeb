<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TacheController;

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

// Route::middleware('auth')->group(function () {
//     Route::resource('tasks', TodoController::class);
// });


// Route::resource('tasks', TaskController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/tasks_edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/tasks_index', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/tasks_destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::middleware(['auth'])->group(function () {
    // Afficher toutes les tâches
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    // Afficher le formulaire pour créer une tâche
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

    // Sauvegarder la nouvelle tâche
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    // Afficher le formulaire pour éditer une tâche
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

    // Mettre à jour la tâche
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::patch('/tasks/{id}/complete', [TaskController::class, 'markAsComplete'])->name('tasks.complete');

});


// Route de la page d'accueil (facultatif)
Route::get('/', function () {
    return Inertia::render('Index'); // Ou une autre vue si nécessaire
});

// Routes pour gérer les tâches
Route::middleware(['auth'])->group(function () {
    Route::resource('taches', TacheController::class);
});


require __DIR__.'/auth.php';
