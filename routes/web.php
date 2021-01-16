<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/despre-noi', [App\Http\Controllers\HomeController::class, 'despreNoi'])->name('despreNoi');

Route::get('/events', [App\Http\Controllers\HomeController::class, 'events'])->name('events');

Route::get('/event-create', [App\Http\Controllers\HomeController::class, 'eventCreate'])->name('eventCreate');

Route::post('/event-create-submit', [App\Http\Controllers\HomeController::class, 'eventCreateSubmit'])->name('eventCreateSubmit');

Route::get('/my-events', [App\Http\Controllers\HomeController::class, 'myEvents'])->name('myEvents');

Route::get('/register', [App\Http\Controllers\Auth\LoginController::class, 'register'])->name('register');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
