<?php

use App\Http\Controllers\ColaboratorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/inscription', function () {
    return view('private.inscription.inscription');
})->middleware(['auth'])->name('inscription');

Route::get('/donation', function () {
    return view('private.donation.donation');
})->middleware(['auth'])->name('donation');

Route::get('/event', function () {
    return view('private.event.event');
})->middleware(['auth'])->name('event');

Route::get('/colaborator', function () {
    return view('private.colaborator.colaborator');
})->middleware(['auth'])->name('colaborator');

Route::get('/clasification', function () {
    return view('private.clasification.clasification');
})->middleware(['auth'])->name('clasification');

Route::get('/category', function () {
    return view('private.category.category');
})->middleware(['auth'])->name('category');

Route::get('/route', function () {
    return view('private.route.route');
})->middleware(['auth'])->name('route');

Route::get('/sponsors', function () {
    return view('private.sponsors.sponsors');
})->middleware(['auth'])->name('sponsors');

Route::get('/documentation', function () {
    return view('private.documentation.documentation');
})->middleware(['auth'])->name('documentation');

Route::get('/modify', function () {
    return view('private.modify_password.modify');
})->middleware(['auth'])->name('modify');

Route::get('/prueba', function () {
    return ColaboratorController::prueba();
})->middleware(['auth'])->name('prueba');

require __DIR__.'/auth.php';
// require __DIR__.'/private.php';
