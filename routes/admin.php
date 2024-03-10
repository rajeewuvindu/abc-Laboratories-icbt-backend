<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

//Public routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');

// Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => ['auth:admins']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

});
Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/appointments', [AdminController::class, 'showAppointments'])->name('admin.appointments');
Route::get('/patients', [AdminController::class, 'showPatients'])->name('admin.patients');
Route::get('/technicians', [AdminController::class, 'showTechnicians'])->name('admin.technicians');
Route::get('/reports', [AdminController::class, 'showReports'])->name('admin.reports');
