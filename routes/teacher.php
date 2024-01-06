<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher;

Route::redirect('teacher', 'teacher/dashboard');

Route::group([
    'middleware' => ['auth', 'verified', 'role:teacher'],
    'prefix' => 'teacher',
    'as' => 'teacher.'
], function () {
    Route::get('dashboard', Teacher\DashboardController::class)
        ->name('dashboard');
});
