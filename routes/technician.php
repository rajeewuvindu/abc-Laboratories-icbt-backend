<?php

use App\Http\Controllers\Technician\AppointmentController;
use App\Http\Controllers\Technician\Auth\ForgotPasswordController;
use App\Http\Controllers\Technician\Auth\LoginController;
use App\Http\Controllers\Technician\Auth\ResetPasswordController;
use App\Http\Controllers\Technician\DoctorController;
use App\Http\Controllers\Technician\PatientController;
use App\Http\Controllers\Technician\ReportController;
use App\Http\Controllers\Technician\TechnicianController;
use Illuminate\Support\Facades\Route;


//Public routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('technician.login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('technician.password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('technician.password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('technician.password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('technician.password.update');

// Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => ['auth:technicians']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('technician.logout');

    // Route::get('/', [TechnicianController::class, 'index'])->name('technician.users');
    Route::get('/', [AppointmentController::class, 'showAppointments'])->name('technician.appointments');

    Route::get('/doctors', [DoctorController::class, 'showDoctors'])->name('technician.doctors');

    
    Route::get('/patients', [PatientController::class, 'showPatients'])->name('technician.patients');
    Route::get('/reports', [ReportController::class, 'showReports'])->name('technician.reports');

});