<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::redirect('admin', 'admin/dashboard');

Route::group([
    'middleware' => ['auth', 'verified', 'role:admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('dashboard', Admin\DashboardController::class)
        ->name('dashboard');
});
