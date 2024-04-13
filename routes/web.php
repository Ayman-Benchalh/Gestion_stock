<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[UserController::class,'index'])->name('IndexUser');
Route::post('/Login',[UserController::class,'Login'])->name('LoginAccount');
Route::post('/CreatAccountP',[UserController::class,'CreatAccountPost'])->name('CreatAccountP');
Route::get('/CreatAccount',[UserController::class,'CreatAccount'])->name('CreatAccount');
