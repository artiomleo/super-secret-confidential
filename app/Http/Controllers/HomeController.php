<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

    public function eventCreate()
    {
        return view('event-create');
    }

    public static function eventCreateSubmit(Request $request)
    {
        $payload = $request->input();
        $service = Service::query()->where('id', $payload['service_id'])->first();
        $payload['user_id'] = Auth::id() ?? null;
        $payload['start_time'] = Carbon::createFromDate($payload['start_time'])->format('Y-m-d\TH:i');
        $payload['end_time'] = Carbon::createFromDate($payload['start_time'])->addMinutes($service->duration)->format('Y-m-d\TH:i');
        $payload['service_id'] = (int) $payload['service_id'];

        Event::query()->create($payload);

        return $payload['user_id'] ? redirect('/my-events?event=success') : redirect('/?event=success');
    }
}
