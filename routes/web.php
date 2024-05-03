<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\PaymentClientController;
use App\Http\Controllers\PaymentFournissersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VenteController;
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

    Route::get('/AjouteProduit',[ProduitController::class,'index'])->name('Ajoute_produit');
    Route::post('/AjouteProduit',[ProduitController::class,'store'])->name('Ajoute_produit');

    Route::get('/AjouteFournisseur',[FournisseurController::class,'index'])->name('Ajoute_Fournisseur');
    Route::post('/AjouteFournisseur',[FournisseurController::class,'store'])->name('Ajoute_Fournisseur');

    Route::get('/AjouteClient',[ClientController::class,'index'])->name('Ajoute_Client');
    Route::post('/AjouteClient',[ClientController::class,'store'])->name('Ajoute_Client');

    Route::get('/Vente',[VenteController::class,'index'])->name('Vente');
    Route::post('/Vente',[VenteController::class,'store'])->name('Vente');

    Route::get('/Vente_produit',[VenteController::class,'create'])->name('Vente_produit');
    Route::post('/Vente_produit',[VenteController::class,'store2'])->name('Vente_produit');

    Route::get('/Vente_Groupe_produit/{IdClient?}',[VenteController::class,'show'])->name('Vente_Groupe_produit');
    Route::post('/Vente_Groupe_produit_P',[VenteController::class,'store2'])->name('Vente_Groupe_produit_P');
    Route::delete('/Vente_Groupe_produit_D',[VenteController::class,'destroy'])->name('Vente_Groupe_produit_D');

    Route::post('/Vente_one_en_G',[VenteController::class,'AjouteVente_group'])->name('Vente_one_for_Groupe');
    // // Route::get('/Vente_Avoute_Groupe_produit',[VenteController::class,'AjouteVente_group'])->name('Vente_Avoute_Groupe_produit');
    // Route::get('/Vente_One_of_groupe_Produit',[VenteController::class,'AjouteVente_group'])->name('Vente_One_of_groupe_Produit');
    Route::post('/Vente_One_of_groupe_Produit',[VenteController::class,'AjouteVente_group_ps'])->name('Vente_One_of_groupe_Produit');

    Route::get('/Pay_client/{codeClient}',[PaymentClientController::class,'index'])->name('Pay_client');
    Route::post('/Pay_client',[PaymentClientController::class,'store'])->name('Pay_client_add');


    Route::get('/Achat',[AchatController::class,'index'])->name('Achat');
    Route::post('/Achat',[AchatController::class,'store'])->name('Achat');


    Route::get('/Achat_produit',[AchatController::class,'create'])->name('Achat_produit');
    Route::post('/Achat_produit',[AchatController::class,'store2'])->name('Achat_produit');

    Route::get('/Achat_Groupe_produit/{IdFournisseur?}',[AchatController::class,'show'])->name('Achat_Groupe_produit');
    Route::post('/Achat_Groupe_produit_P',[AchatController::class,'store2'])->name('Achat_Groupe_produit_P');
    Route::delete('/Achat_Groupe_produit_D',[AchatController::class,'destroy'])->name('Achat_Groupe_produit_D');

    Route::post('/Achat_one_en_G',[AchatController::class,'AjouteAchat_group'])->name('Achat_one_for_Groupe');

    Route::post('/Achat_One_of_groupe_Produit',[AchatController::class,'AjouteAchat_group_ps'])->name('Achat_One_of_groupe_Produit');
 

    Route::get('/Pay_fournisseur/{codeFournisseur}',[PaymentFournissersController::class,'index'])->name('Pay_fournisseur');
    Route::post('/Pay_fournisseur',[PaymentFournissersController::class,'store'])->name('Pay_fournisseur_add');


    Route::get('/Pdf_Facture',[PaymentClientController::class,'show'])->name('Pdf_facture');
});
