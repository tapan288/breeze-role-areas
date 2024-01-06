<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardController;

Route::get('/student/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified', 'role:student'])
    ->name('student.dashboard');
