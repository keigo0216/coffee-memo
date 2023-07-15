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

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/list',
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
    '/coffeeedit/{id}',
    [App\Http\Controllers\HomeController::class, 'coffeeedit']
)->name('coffeeedit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
