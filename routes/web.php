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
// rute autentificare
Auth::routes();
// ruta cu 'middleware' =>'guest'  pentru ca sa poata accesa cei neiregistrati
Route::get('/', ['middleware' =>'guest', function() {
    return view('home');
}]);
// returneaza un view fara controller (paginile care nu interactioneaza cu backend-ul)
Route::get('/coafor', ['middleware' =>'web', function() {
    return view('coafor');
}]);

Route::get('/manichiura', ['middleware' =>'web', function() {
    return view('manichiura');
}]);

Route::get('/cosmetica', ['middleware' =>'web', function() {
    return view('cosmetica');
}]);

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/despreNoi', ['middleware' => 'web', function() {
    return view('about');
}])->name('despreNoi'); // acest nume se foloseste in navbar.blade linia 30

Route::get('/reviews', ['middleware' => 'web', function() {
    return view('reviews')->with([
        'reviews' => App\Models\Review::query()->get(), // asa injectez date in blade -> reviews.blade linia 124
    ]);
}])->name('reviews'); // la fel navbar.blade linia 48
Route::post('/review-create-submit', [ReviewController::class, 'reviewCreate'])->name('reviewCreate'); // acesta il folosesc pentru a face request in <form> in blade -> home.blade -> 113
Route::post('/reviews/{id}/edit', [ReviewController::class, 'editReview']); // la fel ca si sus -> reviews.blade -> 133
Route::post('/reviews/delete', [ReviewController::class, 'deleteReview']); // la fel -> reviews.blade -> 42

Route::get('/event-create', ['middleware' => 'web', function() {
    return view('event-create')->with([
        'events' => collect(Event::query()->select('start', 'end')->get())->toJson(), // iarasi injectez in event-create.blade -> 27
        'services' => collect(Service::query()->select('id', 'duration', 'name')->get())->toJson(),
    ]);
}])->name('eventCreate');

Route::get('/events', [EventController::class, 'events'])->name('events');
Route::get('/myEvents', [EventController::class, 'myEvents'])->name('myEvents');
Route::post('/event-create-submit', ['middleware' =>'web', function(Request $request) {
    return EventController::eventCreateSubmit($request); // aici functie statica pentru ca o apelez din <form> si nu trebuie sa instantiez clasa EventController doar sa execut functia in event-create.blade -> 35
}]);

Route::get('/logout', [LoginController::class, 'logout']); // ruta de logout

Route::get('/fullcalendar', [FullCalendarController::class, 'index']);
Route::post('/fullcalendar/update', [FullCalendarController::class, 'update']);
Route::post('/fullcalendar/delete', [FullCalendarController::class, 'destroy']);



