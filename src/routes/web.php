<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColaboratorController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\landing\LandingController;

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

Route::get('/', [LandingController::class, 'index'])
    ->name('welcome');

Route::get('/terms', function () {
    /*return Inscription::terms();*/
})->name('terms');

// Private
Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin/year', [YearController::class, 'index'])
    ->middleware(['auth'])->name('year');

Route::get('/admin/inscription', [InscriptionController::class, 'index'])
    ->middleware(['auth'])->name('inscription');

Route::get('/admin/donation', [DonationController::class, 'index'])
        ->middleware(['auth'])->name('donation');

Route::get('/admin/colaborator', [ColaboratorController::class, 'index'])
    ->middleware(['auth'])->name('colaborator');

Route::get('/admin/clasification', [MarkController::class, 'index'])
    ->middleware(['auth'])->name('clasification');

Route::get('/admin/category', [CategoryController::class, 'index'])
    ->middleware(['auth'])->name('category');

Route::get('/admin/sponsors', [SponsorController::class, 'index'])
    ->middleware(['auth'])->name('sponsors');

Route::get('/admin/documentation', function () {
    return view('private.documentation.documentation');
})->middleware(['auth'])->name('documentation');

require __DIR__.'/auth.php';
require __DIR__.'/private.php';
