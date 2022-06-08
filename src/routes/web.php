<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColaboratorController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\YearController;
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

Route::get('/year', [YearController::class, 'index'])
    ->middleware(['auth'])->name('year');

Route::get('/inscription', [InscriptionController::class, 'index'])
    ->middleware(['auth'])->name('inscription');

Route::get('/donation', [DonationController::class, 'index'])
        ->middleware(['auth'])->name('donation');

Route::get('/colaborator', [ColaboratorController::class, 'index'])
    ->middleware(['auth'])->name('colaborator');

Route::get('/clasification', function () {
    return view('private.marks.mark');
})->middleware(['auth'])->name('clasification');

Route::get('/category', [CategoryController::class, 'index'])
    ->middleware(['auth'])->name('category');

Route::get('/sponsors', [SponsorController::class, 'index'])
    ->middleware(['auth'])->name('sponsors');

Route::get('/documentation', function () {
    return view('private.documentation.documentation');
})->middleware(['auth'])->name('documentation');

require __DIR__.'/auth.php';
require __DIR__.'/private.php';
