<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/admin/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('admin.dashboard');
