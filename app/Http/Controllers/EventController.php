<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        $authId = Auth::id();

        $payload['user_id'] = $authId ?? null;
        $payload['start'] = Carbon::createFromDate($payload['start'])->format('Y-m-d\TH:i');
        $payload['end'] = Carbon::createFromDate($payload['start'])->addMinutes($service->duration)->format('Y-m-d\TH:i');
        $payload['service_id'] = (int) $payload['service_id'];
        $payload['title'] = $service->name . ' - ' . $payload['name'] . ' - ' . $payload['phone_number'] . '        Durata: ' . $service->duration . ' minute';

        Event::query()->create($payload);

        if ($authId) {
            return redirect('/my-events?event=success');
        }
        else {
            return redirect('/?event=success');
        }
    }
}
