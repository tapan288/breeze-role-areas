<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardController;

Route::redirect('teacher', 'teacher/dashboard');

Route::group([
    'middleware' => ['auth', 'verified', 'role:teacher'],
    'prefix' => 'teacher',
    'as' => 'teacher.'
], function () {
    Route::get('dashboard', DashboardController::class)
        ->name('dashboard');
});
