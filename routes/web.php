<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(
    '/',
    [App\Http\Controllers\HomeController::class, 'list']
)->name('list');

Route::get(
    '/coffeeregister',
    [App\Http\Controllers\HomeController::class, 'coffeeregister']
)->name('coffeeregister');

Route::post(
    '/coffeeregister',
    [App\Http\Controllers\HomeController::class, 'coffeecreate']
)->name('coffeeregister');

Route::get(
    '/coffeedetail/{id}',
    [App\Http\Controllers\HomeController::class, 'coffeedetail']
)->name('coffeedetail');

Route::post(
    '/coffeetrash/{id}',
    [App\Http\Controllers\HomeController::class, 'coffeetrash']
)->name('coffeetrash');

Route::get(
    '/coffeeedit/{id}',
    [App\Http\Controllers\HomeController::class, 'coffeeedit']
)->name('coffeeedit');

Route::post(
    '/coffeeupdate/{id}',
    [App\Http\Controllers\HomeController::class, 'coffeeupdate']
)->name('coffeeupdate');

Auth::routes();
