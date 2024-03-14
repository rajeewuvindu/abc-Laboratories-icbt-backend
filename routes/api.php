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
    Route::get('/user', [PatientController::class, 'user']);

    Route::post('/user', [PatientController::class, 'user']);


    Route::post('/add-appointment', [PatientController::class, 'addAppointment']);

    // 2|60mGny0GrXCeRFdEoSwlX2DWvE61zPMhHJWqn6rs
});
