<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\ChiefController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\SuspectController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VictimController;

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/results', [SearchController::class, 'search'])->name('search.results');Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('crimes', CrimeController::class);
    Route::resource('crimes.cases', CaseController::class)->shallow();
    Route::delete('/crimes/{crime}/cases/{officer}', [CaseController::class, 'destroy'])->name('crimes.cases.destroy');
    Route::resource('crimes.evidence', EvidenceController::class)->shallow();
    Route::resource('crimes.suspects', SuspectController::class)->shallow();
    Route::resource('crimes.victims', VictimController::class)->shallow();
    Route::get('/report/generate', [ReportController::class, 'generate'])->name('report.generate')->middleware('can:view-reports');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class)->middleware('can:manage-users');
    Route::post('/users/{user}/roles', [UserRoleController::class, 'store'])->name('users.roles.store');
    Route::resource('officers', \App\Http\Controllers\Admin\OfficerController::class)->names('officers');
});

Route::middleware(['auth', 'can:manage-crimes'])->prefix('dispatcher')->name('dispatcher.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dispatcher.dashboard');
    })->name('dashboard');
    Route::get('/create', [DispatcherController::class, 'create'])->name('create');
    Route::post('/', [DispatcherController::class, 'store'])->name('store');
});

Route::middleware(['auth', 'can:view-reports'])->prefix('chief')->name('chief.')->group(function () {
    Route::get('/dashboard', [ChiefController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'can:manage-crimes'])->prefix('officer')->name('officer.')->group(function () {
    Route::get('/dashboard', [OfficerController::class, 'dashboard'])->name('dashboard');
    Route::get('/crimes/{crime}', [OfficerController::class, 'show'])->name('crimes.show');
});