<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student;

Route::redirect('student', 'student/dashboard');

Route::group([
    'middleware' => ['auth', 'verified', 'role:student'],
    'prefix' => 'student',
    'as' => 'student.'
], function () {
    Route::get('dashboard', Student\DashboardController::class)
        ->name('dashboard');
});
