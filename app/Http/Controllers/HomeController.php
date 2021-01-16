<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

    public function eventCreateSubmit(Request $request)
    {
        $payload = $request->input();
        $payload['user_id'] = Auth::id();
        $payload['service_id'] = (int) $payload['service_id'];

        Event::query()->create($payload);

        return redirect('/my-events');
    }
}
