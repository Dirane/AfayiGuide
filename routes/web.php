<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PathfinderController;

// Include authentication routes
require __DIR__.'/auth.php';

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Program Finder
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');

// PathFinder - New Controller-based approach
Route::middleware('auth')->group(function () {
    Route::get('/pathfinder', [PathfinderController::class, 'index'])->name('pathfinder.index');
    Route::get('/pathfinder/step1', [PathfinderController::class, 'step1'])->name('pathfinder.step1');
    Route::post('/pathfinder/step2', [PathfinderController::class, 'step2'])->name('pathfinder.step2');
    Route::post('/pathfinder/step3', [PathfinderController::class, 'step3'])->name('pathfinder.step3');
    Route::post('/pathfinder/step4', [PathfinderController::class, 'step4'])->name('pathfinder.step4');
    Route::post('/pathfinder/step5', [PathfinderController::class, 'step5'])->name('pathfinder.step5');
    Route::post('/pathfinder/generate', [PathfinderController::class, 'generateReport'])->name('pathfinder.generate');
    Route::get('/pathfinder/download/{id}', [PathfinderController::class, 'downloadReport'])->name('pathfinder.download');
    Route::get('/pathfinder/reset', [PathfinderController::class, 'reset'])->name('pathfinder.reset');
});

// Schools
Route::get('/schools', [SchoolController::class, 'index'])->name('schools.index');
Route::get('/schools/{school}', [SchoolController::class, 'show'])->name('schools.show');

// Opportunities
Route::get('/opportunities', function () {
    return view('opportunities.index');
})->name('opportunities.index');

// Mentorship
Route::get('/mentorship', function () {
    return view('mentorship.index');
})->name('mentorship.index');

// Authentication routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware('admin')->group(function () {
        Route::resource('admin/programs', \App\Http\Controllers\Admin\ProgramController::class)->names('admin.programs');
        Route::resource('admin/schools', \App\Http\Controllers\Admin\SchoolController::class)->names('admin.schools');
        Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    });
});

// Authentication routes will be added by Breeze
