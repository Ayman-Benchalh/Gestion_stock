<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[UserController::class,'index'])->name('IndexUser');
Route::post('/Login',[UserController::class,'Login'])->name('LoginAccount');
Route::post('/CreatAccountP',[UserController::class,'CreatAccountPost'])->name('CreatAccountP');
Route::get('/CreatAccount',[UserController::class,'CreatAccount'])->name('CreatAccount');
Route::get('/verficOTP',[UserController::class,'verficOTP'])->name('verficOTP');
Route::Post('/verficOTP_P',[UserController::class,'verficOTP_Post'])->name('verficOTP_P');

Route::get('/ForgetPassword',[UserController::class,'Forget_Pas'])->name('ForgetPassword');
Route::post('/ForgetPassword_P',[UserController::class,'Forget_Pas_post'])->name('ForgetPassword_P');
Route::get('/ResetPassword',[UserController::class,'Reset_Pas'])->name('ResetPassword');
Route::post('/ResetPassword_P',[UserController::class,'Reset_Pas_P'])->name('ResetPassword_P');

Route::get('/ResetOTP',[UserController::class,'ResetOTP'])->name('ResetOTP');
Route::Post('/ResetOTP_P',[UserController::class,'ResetOTP_Post'])->name('ResetOTP_P');

Route::middleware(['auth'])->group(function(){
    Route::get('/DashBord',[UserController::class,'DashBord_User'])->name('DashBord_user');
});
