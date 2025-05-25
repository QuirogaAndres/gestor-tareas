<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;





Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('tasks', \App\Http\Controllers\TaskController::class)->middleware(['auth']);
Route::resource('tasks', TaskController::class)->middleware('auth');

Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleCompleted'])->name('tasks.toggle');


Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});


#ruta de inicio 
Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
