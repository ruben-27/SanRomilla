<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboratorController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('auth.error-google-login');
// });
/*Colaborator Routes*/

Route::get('/colaborator_showInsert', [ColaboratorController::class, 'showInsert'])->middleware(['auth'])->name('colaborator_showInsert');

Route::post('/colaboratorInsert', [ColaboratorController::class,'store'])->middleware(['auth'])->name('colaboratorInsert');


/*Inscription Routes*/

Route::post('inscription_consult', [InscriptionController::class, 'Consult'])->middleware(['auth'])->name('inscription_consult');

Route::get('/inscription_showInsert', [InscriptionController::class, 'showInsert'])->middleware(['auth'])->name('inscription_showInsert');

Route::post('/inscriptionInsert', [InscriptionController::class,'store'])->middleware(['auth'])->name('inscriptionInsert');


Route::get('/inscription_date', function () {
    /*return Inscription::showInsert();*/
})->middleware(['auth'])->name('inscription_date');

Route::get('/terms', function () {
    /*return Inscription::terms();*/
})->middleware(['auth'])->name('terms');

Route::get('/hideterms', function () {
    /*return Inscription::hideterms();*/
})->middleware(['auth'])->name('hideterms');

Route::get('/totalBought', function () {
    /*return Inscription::showInsert();*/
})->middleware(['auth'])->name('totalBought');

Route::get('/keepShopping', function () {
    /*return Inscription::keepShopping();*/
})->middleware(['auth'])->name('keepShopping');

Route::get('/totalBought', function () {
    /*return Inscription::showInsert();*/
})->middleware(['auth'])->name('totalBought');

Route::get('inscriptionShowEdit', function () {
    /*return Inscription::ShowEdit();*/
})->middleware(['auth'])->name('colaboratorShowEdit');

Route::get('/inscriptionValidateEdit', function () {
    /*return Inscription::validateEdit();*/
})->middleware(['auth'])->name('colaboratorValidateEdit');

Route::get('/inscriptionEdit', function () {
    /*return Inscription::edit();*/
})->middleware(['auth'])->name('colaboratorEdit');

/*Donation Routes*/ 

Route::post('/donation_consult', [DonationController::class, 'Consult'])->middleware(['auth'])->name('donation_consult');

Route::get('/donation_showInsert', [DonationController::class, 'showInsert'])->middleware(['auth'])->name('donation_showInsert');

Route::post('/donationInsert', [DonationController::class,'store'])->middleware(['auth'])->name('donationInsert');

/*Sponsor Routes*/ 

Route::post('/sponsor_consult', [SponsorController::class, 'Consult'])->middleware(['auth'])->name('sponsor_consult');

Route::get('/sponsor_showInsert', [SponsorController::class, 'showInsert'])->middleware(['auth'])->name('sponsor_showInsert');

Route::post('/sponsorInsert', [SponsorController::class,'store'])->middleware(['auth'])->name('sponsorInsert');

/*Category Routes*/ 

Route::get('/categoryModify/{id}', [CategoryController::class, 'modify'])->middleware(['auth'])->name('categoryModify');

Route::post('/categoryUpdate', [CategoryController::class, 'update'])->middleware(['auth'])->name('categoryUpdate');

Route::post('/category_consult', [CategoryController::class, 'Consult'])->middleware(['auth'])->name('category_consult');

Route::get('/category_showInsert', [CategoryController::class, 'showInsert'])->middleware(['auth'])->name('category_showInsert');

Route::post('/categoryInsert', [CategoryController::class,'store'])->middleware(['auth'])->name('categoryInsert');


