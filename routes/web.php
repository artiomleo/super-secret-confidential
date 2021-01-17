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

Route::get('/', ['middleware' =>'guest', function(){
    return view('home');
}]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/despre-noi', ['middleware' => ['web'], function(){
    return view('about');
}])->name('despreNoi');

Route::get('/events', [App\Http\Controllers\HomeController::class, 'events'])->name('events');

Route::get('/event-create', ['middleware' =>'web', function(){
    return view('event-create');
}])->name('eventCreate');

Route::post('/event-create-submit', ['middleware' =>'web', function(\Illuminate\Http\Request $request){
    return App\Http\Controllers\HomeController::eventCreateSubmit($request);
}]);

Route::get('/my-events', [App\Http\Controllers\HomeController::class, 'myEvents'])->name('myEvents');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/fullcalendar', [\App\Http\Controllers\FullCalendarController::class, 'index']);

Route::post('/fullcalendar/create', [\App\Http\Controllers\FullCalendarController::class, 'create']);

