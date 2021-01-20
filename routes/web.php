<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Models\Event;
use App\Models\Service;
use Illuminate\Http\Request;
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

Route::get('/', ['middleware' =>'guest', function() {
    return view('home');
}]);

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/coafor', [HomeController::class, 'coafor'])->name('coafor');
Route::get('/manichiura', [HomeController::class, 'manichiura'])->name('manichiura');
Route::get('/cosmetica', [HomeController::class, 'cosmetica'])->name('cosmetica');

Route::get('/despre-noi', ['middleware' => 'web', function() {
    return view('about');
}])->name('despreNoi');

Route::get('/reviews', ['middleware' => 'web', function() {
    return view('reviews')->with([
        'reviews' => App\Models\Review::query()->get(),
    ]);
}])->name('reviews');
Route::post('/review-create-submit', [ReviewController::class, 'reviewCreate'])->name('reviewCreate');
Route::post('/reviews/edit', [ReviewController::class, 'editReview']);
Route::post('/reviews/delete', [ReviewController::class, 'deleteReview']);

Route::get('/event-create', ['middleware' => 'web', function() {
    return view('event-create')->with([
        'events' => collect(Event::query()->select('start', 'end')->get())->toJson(),
        'services' => collect(Service::query()->select('id', 'duration', 'name')->get())->toJson(),
    ]);
}])->name('eventCreate');

Route::get('/events', [EventController::class, 'events'])->name('events');
Route::get('/my-events', [EventController::class, 'myEvents'])->name('myEvents');
Route::post('/event-create-submit', ['middleware' =>'web', function(Request $request) {
    return EventController::eventCreateSubmit($request);
}]);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/fullcalendar', [FullCalendarController::class, 'index']);
Route::post('/fullcalendar/update', [FullCalendarController::class, 'update']);
Route::post('/fullcalendar/delete', [FullCalendarController::class, 'destroy']);



