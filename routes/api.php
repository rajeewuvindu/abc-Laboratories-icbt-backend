<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('api.password.email');


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/check-login', [PatientController::class, 'checkLogin']);

    // Route::post('/user', [PatientController::class, 'user']);

    Route::post('/make-payment', [PatientController::class, 'makePayment']);

    Route::post('/add-appointment', [PatientController::class, 'addAppointment']);
    Route::get('/appointments', [PatientController::class, 'getAppointments']);
    Route::get('/payments', [PatientController::class, 'getPayments']);

    Route::get('/reports', [PatientController::class, 'getReports']);

    Route::get('/test-types', [PatientController::class, 'getTestTypes']);


    // 2|60mGny0GrXCeRFdEoSwlX2DWvE61zPMhHJWqn6rs
});

