<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\TaskController;
use App\Http\Middleware\TokenVerificationMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// api route

Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);

Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);


Route::middleware([TokenVerificationMiddleware::class])->group(function () {
    Route::get('/task-list', [TaskController::class, 'taskList']);
    Route::post('/task-create', [TaskController::class, 'taskCreate']);
    Route::post('/task-update', [TaskController::class, 'taskUpdate']);
    Route::post('/task-delete', [TaskController::class, 'taskDelete']);
    Route::post('/get-task-id', [TaskController::class, 'taskById']);
    Route::post('/task-show', [TaskController::class, 'taskShow']);   
});