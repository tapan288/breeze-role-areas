<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::redirect('admin', 'admin/dashboard');

Route::group([
    'middleware' => ['auth', 'verified', 'role:admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('dashboard', DashboardController::class)
        ->name('dashboard');
});
