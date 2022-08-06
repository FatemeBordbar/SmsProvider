<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SmsController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register'])->name('api-register');
Route::post('/login', [LoginController::class, 'login'])->name('api-login');
Route::middleware('auth:api')->post('/send_sms', [SmsController::class, 'sendSms'])->name('sms.send');
Route::get('/sms_items', function () {
    return SmsResource::collection(SmsItem::all());
});

