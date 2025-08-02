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
    Route::get('/pathfinder/step2', [PathfinderController::class, 'step2'])->name('pathfinder.step2');
    Route::post('/pathfinder/step2', [PathfinderController::class, 'step2Post'])->name('pathfinder.step2.post');
    Route::get('/pathfinder/step3', [PathfinderController::class, 'step3'])->name('pathfinder.step3');
    Route::post('/pathfinder/step3', [PathfinderController::class, 'step3Post'])->name('pathfinder.step3.post');
    Route::get('/pathfinder/step4', [PathfinderController::class, 'step4'])->name('pathfinder.step4');
    Route::post('/pathfinder/step4', [PathfinderController::class, 'step4Post'])->name('pathfinder.step4.post');
    Route::get('/pathfinder/step5', [PathfinderController::class, 'step5'])->name('pathfinder.step5');
    Route::post('/pathfinder/step5', [PathfinderController::class, 'step5Post'])->name('pathfinder.step5.post');
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('role.redirect');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        
        // Schools Management
        Route::resource('schools', App\Http\Controllers\Admin\SchoolController::class);
        
        // Programs Management
        Route::resource('programs', App\Http\Controllers\Admin\ProgramController::class);
        
        // Opportunities Management
        Route::resource('opportunities', App\Http\Controllers\Admin\OpportunityController::class);
        
        // Users Management
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        
        // Mentors Management
        Route::resource('mentors', App\Http\Controllers\Admin\MentorController::class);
        
        // Assessments Management
        Route::resource('assessments', App\Http\Controllers\Admin\AssessmentController::class);
        Route::get('/assessments/export', [App\Http\Controllers\Admin\AssessmentController::class, 'export'])->name('assessments.export');
        
        // Reports & Analytics
        Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/users', [App\Http\Controllers\Admin\ReportController::class, 'users'])->name('reports.users');
        Route::get('/reports/assessments', [App\Http\Controllers\Admin\ReportController::class, 'assessments'])->name('reports.assessments');
        
        // Settings
        Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
        Route::post('/settings/backup', [App\Http\Controllers\Admin\SettingController::class, 'backup'])->name('settings.backup');
        Route::post('/settings/clear-cache', [App\Http\Controllers\Admin\SettingController::class, 'clearCache'])->name('settings.clearCache');
    });
});

// Authentication routes will be added by Breeze
