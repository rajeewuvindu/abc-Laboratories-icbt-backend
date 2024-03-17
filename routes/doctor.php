<?php
use Illuminate\Support\Facades\Route;

//Public routes

use App\Http\Controllers\Doctor\Auth\ForgotPasswordController;
use App\Http\Controllers\Doctor\Auth\LoginController;
use App\Http\Controllers\Doctor\Auth\ResetPasswordController;
use App\Http\Controllers\Doctor\DoctorController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('doctor.login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('doctor.password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('doctor.password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('doctor.password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('doctor.password.update');

// Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => ['auth:doctors']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('doctor.logout');

    Route::get('/', [DoctorController::class, 'showAppointments'])->name('doctor.appointments');
    // Route::get('/', [DoctorController::class, 'index'])->name('doctor.users');
});
