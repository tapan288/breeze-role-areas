<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardController;

Route::get('/teacher/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('teacher.dashboard');
