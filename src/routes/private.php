<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboratorController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\InscriptionController;
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

Route::get('/colaborator_datatable', function () {
    /*return Colaborator::datatable();*/
})->middleware(['auth'])->name('colaborator_datatable');

Route::get('/colaborator_showInsert', function () {
    /*return Colaborator::showInsert();*/
})->middleware(['auth'])->name('colaborator_showInsert');

Route::get('/colaborator_Insert', function () {
    /*return Colaborator::insert();*/
})->middleware(['auth'])->name('colaborator_Insert');

Route::get('/colaborator_ShowEdit', function () {
    /*return Colaborator::ShowEdit();*/
})->middleware(['auth'])->name('colaborator_ShowEdit');

Route::get('/colaborator_Edit', function () {
    /*return Colaborator::edit();*/
})->middleware(['auth'])->name('colaborator_Edit');

Route::get('/colaborator_RemoveAction', function () {
    /*return Colaborator::removeAction();*/
})->middleware(['auth'])->name('colaborator_RemoveAction');

Route::get('/colaborator_AcceptRemove', function () {
   /*return Colaborator::acceptRemove();*/
})->middleware(['auth'])->name('colaborator_AcceptRemove');

/*Inscription Routes*/

Route::get('/inscription_date', function () {
    /*return Inscription::showInsert();*/
})->middleware(['auth'])->name('inscription_date');

Route::get('/incription_datatable', function () {
    /*return Inscription::datatable();*/
})->middleware(['auth'])->name('incription_datatable');

Route::get('/inscription_form', function () {
     /*return Inscription::form();*/
})->middleware(['auth'])->name('inscription_form');

Route::get('/inscription_showInsert', function () {
    /*return Inscription::showInsert();*/
})->middleware(['auth'])->name('inscription_showInsert');

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

Route::get('/inscriptionInsert', function () {
    /*return Inscription::insert();*/
})->middleware(['auth'])->name('ColaboratorInsert');

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
Route::get('/donation_consult', function () {
    /*return Donation::Consult();*/
})->middleware(['auth'])->name('donation_consult');

Route::get('/donation_showInsert', [DonationController::class, 'showInsert'])->middleware(['auth'])->name('donation_showInsert');

Route::get('/donation_donation', function () {
    /*return Donation::donation();*/
})->middleware(['auth'])->name('donation_donation');

Route::get('/donationInsert', function () {
    $data = array();
    $data["name"] = $_REQUEST["name"];
    $data["last_name"] = $_REQUEST["last_name"];
    $data["amount"] = $_REQUEST["amount"];
    $data["size"] = $_REQUEST["size"];
    return DonationController::insert($data);
})->middleware(['auth'])->name('donationInsert');

