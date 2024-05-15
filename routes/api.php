<?php

use App\Http\Controllers\Produit_Api_Controller;
use App\Http\Controllers\ProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('Produit', Produit_Api_Controller::class);
