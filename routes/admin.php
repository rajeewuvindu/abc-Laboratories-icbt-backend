<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\TechnicianController;
use App\Http\Controllers\Admin\TestTypeController;
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
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    //Technician
    Route::get('/technicians', [TechnicianController::class, 'showTechnicians'])->name('admin.technicians');
    Route::get('/add-technician', [TechnicianController::class, 'showAddTechnicianForm'])->name('admin.add_technician_form');
    Route::post('/save-technician', [TechnicianController::class, 'addTechnician'])->name('admin.save_technician');

    Route::get('/edit-technician/{technician}', [TechnicianController::class, 'showEditTechnicianForm'])->name('admin.edit_technician_form');
    Route::post('/update-technician', [TechnicianController::class, 'updateTechnician'])->name('admin.update_technician');
    Route::get('/remove-technician/{technician}', [TechnicianController::class, 'removeTechnician'])->name('admin.remove_technician');

    //Doctors
    Route::get('/doctors', [DoctorController::class, 'showDoctors'])->name('admin.doctors');
    Route::get('/add-doctor', [DoctorController::class, 'showAddDoctorForm'])->name('admin.add_doctor_form');
    Route::post('/save-doctor', [DoctorController::class, 'addDoctor'])->name('admin.save_doctor');

    Route::get('/edit-doctor/{doctor}', [DoctorController::class, 'showEditDoctorForm'])->name('admin.edit_doctor_form');
    Route::post('/update-doctor', [DoctorController::class, 'updateDoctor'])->name('admin.update_doctor');
    Route::get('/remove-doctor/{doctor}', [DoctorController::class, 'removeDoctor'])->name('admin.remove_doctor');

    //Test Type
    Route::get('/test-types', [TestTypeController::class, 'showTestTypes'])->name('admin.test_types');
    Route::get('/add-test-type', [TestTypeController::class, 'showAddTestTypeForm'])->name('admin.add_test_type_form');
    Route::post('/save-test-type', [TestTypeController::class, 'addTestType'])->name('admin.save_test_type');

    Route::get('/edit-test-type/{test_type}', [TestTypeController::class, 'showEditTestTypeForm'])->name('admin.edit_test_type_form');
    Route::post('/update-test-type', [TestTypeController::class, 'updateTestType'])->name('admin.update_test_type');
    Route::get('/remove-test-type/{test_type}', [TestTypeController::class, 'removeTestType'])->name('admin.remove_test_type');

    Route::get('/appointments', [AdminController::class, 'showAppointments'])->name('admin.appointments');
    Route::get('/patients', [AdminController::class, 'showPatients'])->name('admin.patients');

    Route::get('/reports', [AdminController::class, 'showReports'])->name('admin.reports');
});
