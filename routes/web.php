<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\PathfinderController;
use App\Http\Controllers\MentorshipBookingController;

use Illuminate\Support\Facades\Route;

// Include authentication routes
require __DIR__.'/auth.php';

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Schools
Route::get('/schools', [SchoolController::class, 'index'])->name('schools.index');
Route::get('/schools/{school}', [SchoolController::class, 'show'])->name('schools.show');

// Opportunities
Route::get('/opportunities', function () {
    return view('opportunities.index');
})->name('opportunities.index');

// Mentorship
Route::middleware(['auth', 'mentorship.access'])->group(function () {
    Route::get('/mentorship', [MentorshipBookingController::class, 'index'])->name('mentorship.index');
    Route::get('/mentorship/create', [MentorshipBookingController::class, 'create'])->name('mentorship.create');
    Route::post('/mentorship', [MentorshipBookingController::class, 'store'])->name('mentorship.store');
    Route::get('/mentorship/success/{booking}', [MentorshipBookingController::class, 'success'])->name('mentorship.success');
    Route::get('/mentorship/my-bookings', [MentorshipBookingController::class, 'myBookings'])->name('mentorship.my-bookings');
});

// PathFinder - New Controller-based approach
Route::middleware(['auth', 'pathfinder.access'])->group(function () {
    Route::get('/pathfinder', [PathfinderController::class, 'index'])->name('pathfinder.index');
    Route::get('/pathfinder/step1', [PathfinderController::class, 'step1'])->name('pathfinder.step1');
    Route::post('/pathfinder/step2', [PathfinderController::class, 'step2'])->name('pathfinder.step2');
    Route::post('/pathfinder/step3', [PathfinderController::class, 'step3'])->name('pathfinder.step3');
    Route::post('/pathfinder/step4', [PathfinderController::class, 'step4'])->name('pathfinder.step4');
    Route::post('/pathfinder/step5', [PathfinderController::class, 'step5'])->name('pathfinder.step5');
    Route::post('/pathfinder/generate', [PathfinderController::class, 'generateReport'])->name('pathfinder.generate');
    Route::get('/pathfinder/results/{assessment}', [PathfinderController::class, 'results'])->name('pathfinder.results');
    Route::get('/pathfinder/download/{id}', [PathfinderController::class, 'downloadReport'])->name('pathfinder.download');
    Route::get('/pathfinder/reset', [PathfinderController::class, 'reset'])->name('pathfinder.reset');
});

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
        Route::resource('schools', App\Http\Controllers\Admin\SchoolController::class);
        Route::resource('opportunities', App\Http\Controllers\Admin\OpportunityController::class);
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::resource('mentors', App\Http\Controllers\Admin\MentorController::class);
        Route::resource('assessments', App\Http\Controllers\Admin\AssessmentController::class)->except(['create', 'store', 'edit', 'update']);
        Route::get('/assessments/export', [App\Http\Controllers\Admin\AssessmentController::class, 'export'])->name('assessments.export');

        Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/users', [App\Http\Controllers\Admin\ReportController::class, 'users'])->name('reports.users');
        Route::get('/reports/assessments', [App\Http\Controllers\Admin\ReportController::class, 'assessments'])->name('reports.assessments');
        
        // Mentorship Bookings
        Route::resource('mentorship-bookings', App\Http\Controllers\Admin\MentorshipBookingController::class)->except(['create', 'store', 'edit', 'update']);
        Route::post('/mentorship-bookings/{booking}/assign-mentor', [App\Http\Controllers\Admin\MentorshipBookingController::class, 'assignMentor'])->name('mentorship-bookings.assign-mentor');
        Route::post('/mentorship-bookings/{booking}/update-status', [App\Http\Controllers\Admin\MentorshipBookingController::class, 'updateStatus'])->name('mentorship-bookings.update-status');
        
        Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
        Route::post('/settings/backup', [App\Http\Controllers\Admin\SettingController::class, 'backup'])->name('settings.backup');
        Route::post('/settings/clear-cache', [App\Http\Controllers\Admin\SettingController::class, 'clearCache'])->name('settings.clearCache');
    });
});

// Authentication routes will be added by Breeze
