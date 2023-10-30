<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MyProfile\LayoutController;


Route::get('/locale/{locale}', [LocalizationController::class, 'locale']);





Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-store', [AuthController::class, 'registerStore'])->name('registerStore');
Route::post('/enrollRegisterStore', [AuthController::class, 'enrollRegisterStore'])->name('enrollRegisterStore');
Route::get('/register-verify/{token}', [AuthController::class, 'registerVerify'])->name('registerVerify');
Route::get('/verify-notification', [AuthController::class, 'verifyNotification'])->name('verifyNotification');

Route::post('/verify-resend', [AuthController::class, 'verifyResend'])->name('verifyResend');

Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password-process', [AuthController::class, 'forgetPasswordProcess'])->name('forgetPasswordProcess');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('/reset-password-process', [AuthController::class, 'resetPasswordProcess'])->name('resetPasswordProcess');
Route::get('/reset-verify-notification', [AuthController::class, 'resetVerifyNotification'])->name('resetVerifyNotification');

Route::post('/enrol-login-process', [AuthController::class, 'enrollLoginProcess'])->name('enrollLoginProcess');
Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('loginProcess');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



