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
        $this->middleware('web');
    }

    public function myEvents()
    {
        return view('myEvents');
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
        $dataFrontend = $request->input();
        $service = Service::query()->where('id', $dataFrontend['service_id'])->first();
        $authenticatedId = Auth::id();

        $dataFrontend['user_id'] = $authenticatedId ?? null;
        $dataFrontend['start'] = Carbon::createFromDate($dataFrontend['start'])->format('Y-m-d\TH:i');
        $dataFrontend['end'] = Carbon::createFromDate($dataFrontend['start'])->addMinutes($service->duration)->format('Y-m-d\TH:i');
        $dataFrontend['service_id'] = (int) $dataFrontend['service_id'];
        $dataFrontend['title'] = $service->name . ' - ' . $dataFrontend['name'] . ' - ' . $dataFrontend['phone_number'] . '        Durata: ' . $service->duration . ' minute';

        Event::query()->create($dataFrontend);

        if ($authenticatedId) {
            return redirect('/myEvents?event=success');
        }
        else {
            return redirect('/?event=success');
        }
    }
}
