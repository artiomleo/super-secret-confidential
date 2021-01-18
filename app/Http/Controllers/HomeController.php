<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Review;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function despreNoi()
    {
        return view('about');
    }

    public function myEvents()
    {
        return view('my-events');
    }

    public function events()
    {
        return view('events');
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function deleteReview(Request $request)
    {
        $review = Review::find($request->input('id'));

        $review->delete();
    }

    public function eventCreate()
    {
        return view('event-create');
    }

    public function reviewCreate(Request $request)
    {
        $payload = $request->input();
        $userId = Auth::id();
        $payload['user_id'] = $userId;

        Review::query()->create($payload);

        return redirect('/home?event=successReview');
    }

    public static function eventCreateSubmit(Request $request)
    {
        $payload = $request->input();
        $service = Service::query()->where('id', $payload['service_id'])->first();
        $payload['user_id'] = Auth::id() ?? null;
        $payload['start'] = Carbon::createFromDate($payload['start'])->format('Y-m-d\TH:i');
        $payload['end'] = Carbon::createFromDate($payload['start'])->addMinutes($service->duration)->format('Y-m-d\TH:i');
        $payload['service_id'] = (int) $payload['service_id'];
        $service = Service::query()->where('id', $payload['service_id'])->first();
        $payload['title'] = $service->name . ' - ' . $payload['name'] . ' - ' . $payload['phone_number'] . '        Durata: ' . $service->duration . ' minute';

        Event::query()->create($payload);

        $returnType = [
            $payload['user_id'] => redirect('/my-events?event=success'),
            null => redirect('/?event=success'),
            true => redirect('/events')
        ];

        return $returnType[Auth::id() ?: $payload['user_id']];
    }
}
