<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardController;

Route::redirect('student', 'student/dashboard');

Route::group([
    'middleware' => ['auth', 'verified', 'role:student'],
    'prefix' => 'student',
    'as' => 'student.'
], function () {
    Route::get('dashboard', DashboardController::class)
        ->name('dashboard');
});
