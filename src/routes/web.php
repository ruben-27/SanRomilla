<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/inscription', function () {
    return view('inscription');
})->middleware(['auth'])->name('inscription');

Route::get('/donation', function () {
    return view('donation');
})->middleware(['auth'])->name('donation');

Route::get('/event', function () {
    return view('event');
})->middleware(['auth'])->name('event');

Route::get('/colaborator', function () {
    return view('colaborator');
})->middleware(['auth'])->name('colaborator');

Route::get('/clasification', function () {
    return view('clasification');
})->middleware(['auth'])->name('clasification');

Route::get('/category', function () {
    return view('category');
})->middleware(['auth'])->name('category');

Route::get('/route', function () {
    return view('route');
})->middleware(['auth'])->name('route');

Route::get('/sponsors', function () {
    return view('sponsors');
})->middleware(['auth'])->name('sponsors');

Route::get('/documentation', function () {
    return view('documentation');
})->middleware(['auth'])->name('documentation');

Route::get('/modify', function () {
    return view('modify');
})->middleware(['auth'])->name('modify');

require __DIR__.'/auth.php';
