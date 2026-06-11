<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\MessageController;
use Illuminate\Support\Facades\Route;

// Healthcheck
Route::get('/up', fn() => 'OK');

// Public portfolio routes
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('contact.store');

// Auth routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('certificates', CertificateController::class)->except(['show']);
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
    Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
}); 