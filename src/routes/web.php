<?php

use App\Http\Controllers\ColaboratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;

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

// Public
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/terms', function () {
    /*return Inscription::terms();*/
})->middleware(['auth'])->name('terms');

// Private
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/inscription', function () {
    return view('private.inscriptions.inscription');
})->middleware(['auth'])->name('inscription');

Route::get('/donation', function () {
    return view('private.donations.donation');
})->middleware(['auth'])->name('donation');

Route::get('/colaborator', function () {
    return view('private.colaborators.colaborator');
})->middleware(['auth'])->name('colaborator');

Route::get('/clasification', function () {
    return view('private.marks.mark');
})->middleware(['auth'])->name('clasification');

Route::get('/category', function () {
    return view('private.categories.category');
})->middleware(['auth'])->name('category');

Route::get('/sponsors', function () {
    return view('private.sponsors.sponsors');
})->middleware(['auth'])->name('sponsors');

Route::get('/documentation', function () {
    return view('private.documentation.documentation');
})->middleware(['auth'])->name('documentation');

require __DIR__.'/auth.php';
require __DIR__.'/private.php';
