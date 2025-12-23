<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/rules', [PageController::class, 'rules'])->name('rules');
Route::get('/info', [PageController::class, 'info'])->name('info');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{newsPost}', [NewsController::class, 'show'])->name('news.show');

use App\Http\Controllers\TeamController;
Route::get('/team', [TeamController::class, 'index'])->name('team.index');

use App\Http\Controllers\StatsController;
Route::get('/stats', [StatsController::class, 'index'])->name('stats.index');

use App\Http\Controllers\GalleryController;
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

use App\Http\Controllers\ContactController;
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

use App\Http\Controllers\TicketController;
Route::get('/tickets', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/view/{token}', [\App\Http\Controllers\TicketViewController::class, 'show'])->name('tickets.view');
Route::post('/tickets/view/{token}/reply', [\App\Http\Controllers\TicketViewController::class, 'reply'])->name('tickets.user-reply');

use App\Http\Controllers\ApplicationController;
Route::get('/apply', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/apply', [ApplicationController::class, 'store'])->name('applications.store');



use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Custom Admin Routes
use App\Http\Controllers\AdminController;
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // News Management
    Route::resource('news', \App\Http\Controllers\AdminNewsController::class);

    // Team Management
    Route::resource('team', \App\Http\Controllers\AdminTeamController::class);

    // Gallery Management
    Route::resource('gallery', \App\Http\Controllers\AdminGalleryController::class);

    // Stats Management
    Route::get('/stats', [\App\Http\Controllers\AdminStatsController::class, 'index'])->name('stats.index');

    // Applications Management
    Route::resource('applications', \App\Http\Controllers\AdminApplicationController::class)->only(['index', 'show', 'update']);

    // Tickets Management
    Route::post('tickets/{ticket}/reply', [\App\Http\Controllers\AdminTicketController::class, 'reply'])->name('tickets.reply');
    Route::resource('tickets', \App\Http\Controllers\AdminTicketController::class);

    // Settings Management
    Route::get('/settings', [\App\Http\Controllers\AdminSettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [\App\Http\Controllers\AdminSettingsController::class, 'update'])->name('settings.update');
    
    // Hero Images Management
    Route::resource('hero-images', \App\Http\Controllers\AdminHeroImageController::class);
    
    // Rules Management
    Route::resource('rules', \App\Http\Controllers\AdminRuleController::class);

    // Jobs Management
    Route::resource('jobs', \App\Http\Controllers\AdminJobController::class);

    // User Management
    Route::resource('users', \App\Http\Controllers\AdminUserController::class);
});
