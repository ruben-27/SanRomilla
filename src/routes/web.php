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
});
Route::get('/inscription', function () {
    return view('inscription');
});
Route::get('/donation', function () {
    return view('donation');
});
Route::get('/event', function () {
    return view('event');
});
Route::get('/colaborator', function () {
    return view('colaborator');
});
Route::get('/clasification', function () {
    return view('clasification');
});
Route::get('/category', function () {
    return view('category');
});
Route::get('/route', function () {
    return view('route');
});
Route::get('/sponsors', function () {
    return view('sponsors');
});
Route::get('/documentation', function () {
    return view('documentation');
});
Route::get('/modify', function () {
    return view('modify');
});
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

require __DIR__.'/auth.php';
