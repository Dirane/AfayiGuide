<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Include authentication routes
require __DIR__.'/auth.php';

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Program Finder
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');

// PathFinder
Route::get('/pathfinder', function () {
    return view('pathfinder.index');
})->name('pathfinder.index');

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware('admin')->group(function () {
        Route::resource('admin/programs', ProgramController::class)->except(['show']);
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});

// Authentication routes will be added by Breeze
