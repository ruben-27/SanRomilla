<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboratorController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarkController;
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

/*Colaborator Routes*/
Route::get('/admin/colaborator_showInsert', [ColaboratorController::class, 'showInsert'])
    ->middleware(['auth'])->name('colaborator_showInsert');

Route::post('/admin/colaboratorInsert', [ColaboratorController::class,'store'])
    ->middleware(['auth'])->name('colaboratorInsert');

Route::get('/admin/colaboratorModify/{id}', [ColaboratorController::class, 'modify'])
    ->middleware(['auth'])->name('colaboratorModify');

Route::post('/admin/colaboratorUpdate', [ColaboratorController::class, 'update'])
    ->middleware(['auth'])->name('colaboratorUpdate');


/*Inscription Routes*/
Route::post('/admin/inscription_consult', [InscriptionController::class, 'Consult'])
    ->middleware(['auth'])->name('inscription_consult');

Route::get('/admin/inscription_showInsert', [InscriptionController::class, 'showInsert'])
    ->middleware(['auth'])->name('inscription_showInsert');

Route::post('/admin/inscriptionInsert', [InscriptionController::class,'store'])
    ->middleware(['auth'])->name('inscriptionInsert');


/*Donation Routes*/
Route::post('/admin/donation_consult', [DonationController::class, 'Consult'])
    ->middleware(['auth'])->name('donation_consult');

Route::get('/admin/donation_showInsert', [DonationController::class, 'showInsert'])
    ->middleware(['auth'])->name('donation_showInsert');

Route::post('/admin/donationInsert', [DonationController::class,'store'])
    ->middleware(['auth'])->name('donationInsert');


/*Sponsor Routes*/
Route::post('/admin/sponsor_consult', [SponsorController::class, 'Consult'])
    ->middleware(['auth'])->name('sponsor_consult');

Route::get('/admin/sponsor_showInsert', [SponsorController::class, 'showInsert'])
    ->middleware(['auth'])->name('sponsor_showInsert');

Route::post('/admin/sponsorInsert', [SponsorController::class,'store'])
    ->middleware(['auth'])->name('sponsorInsert');

Route::get('/admin/sponsorModify/{id}', [SponsorController::class, 'modify'])
    ->middleware(['auth'])->name('sponsorModify');

Route::post('/admin/sponsorUpdate', [SponsorController::class, 'update'])
    ->middleware(['auth'])->name('sponsorUpdate');


/*Category Routes*/
Route::get('/admin/categoryModify/{id}', [CategoryController::class, 'modify'])
    ->middleware(['auth'])->name('categoryModify');

Route::post('/admin/categoryUpdate', [CategoryController::class, 'update'])
    ->middleware(['auth'])->name('categoryUpdate');

Route::post('/admin/category_consult', [CategoryController::class, 'Consult'])
    ->middleware(['auth'])->name('category_consult');

Route::get('/admin/category_showInsert', [CategoryController::class, 'showInsert'])
    ->middleware(['auth'])->name('category_showInsert');

Route::post('/admin/categoryInsert', [CategoryController::class,'store'])
    ->middleware(['auth'])->name('categoryInsert');

Route::post('/admin/getCategoriesInfo', [CategoryController::class,'getCategoriesInfo'])
    ->middleware(['auth'])->name('getCategoriesInfo');

/*Mark Routes*/

Route::get('/admin/startCategory/{id}', [MarkController::class, 'startCategory'])
    ->middleware(['auth'])->name('startCategory');

Route::post('/admin/fillCategory', [MarkController::class, 'fillCategory'])
    ->middleware(['auth'])->name('fillCategory');

Route::post('/admin/markDatatable', [MarkController::class, 'markDatatable'])
    ->middleware(['auth'])->name('markDatatable');
