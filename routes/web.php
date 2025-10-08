<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\MooraController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MooraController::class, 'index'])->middleware(['auth']);

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 // Tambahan untuk SPK
Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('criteria', CriteriaController::class);
    Route::resource('evaluations', EvaluationController::class)->only(['index','edit','create','store','destroy']);
    Route::get('/moora', [MooraController::class, 'index'])->name('moora.index');
});

require __DIR__.'/auth.php';
