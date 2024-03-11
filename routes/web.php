<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('api.password.reset');
// Route::post('/password/reset', [AuthController::class, 'reset'])->name('api.password.update');
// Route::get('/password/reset-success', function () {
//     return view('api-support-views.auth.passwords.reset-success');
// })->name('api.password.reset-success');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
