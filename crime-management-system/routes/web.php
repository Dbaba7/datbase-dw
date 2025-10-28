<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\CrimeController;

use App\Http\Controllers\CaseController;

use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\ReportController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('crimes', CrimeController::class);
    Route::resource('crimes.cases', CaseController::class)->shallow();
    Route::resource('crimes.evidence', EvidenceController::class)->shallow();
    Route::get('/report/generate', [ReportController::class, 'generate'])->name('report.generate');
});

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

require __DIR__.'/auth.php';

use App\Http\Controllers\Admin\UserRoleController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::post('users/{user}/roles', [UserRoleController::class, 'store'])->name('users.roles.store');
});
