<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardController;

Route::get('/student/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('student.dashboard');
