<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\MooraController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// SPK Routes
Route::middleware(['auth'])->group(function () {
    // Student Routes with Import
    Route::resource('students', StudentController::class);
    Route::get('/students-import', [StudentController::class, 'importForm'])->name('students.import.form');
    Route::post('/students-import', [StudentController::class, 'import'])->name('students.import');
    Route::get('/students-template', [StudentController::class, 'downloadTemplate'])->name('students.template');
    
    Route::resource('criteria', CriteriaController::class);
    Route::resource('evaluations', EvaluationController::class)->only(['index','edit','create','store','update','destroy']);
    
    // MOORA Routes - Separated
    Route::get('/moora', [MooraController::class, 'index'])->name('moora.index');
    Route::get('/moora/ranking', [MooraController::class, 'ranking'])->name('moora.ranking');
});

require __DIR__.'/auth.php';