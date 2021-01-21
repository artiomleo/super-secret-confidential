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

    public static function eventCreateSubmit(Request $request)
    {
        // iau datele de pe frontend cu $request->input(); si le pun in variabila $dataFrontend de aici vin datele -> event-create.blade -> 35
        $dataFrontend = $request->input();
        // caut serviciul cu un id anumit
        $service = Service::query()->where('id', $dataFrontend['service_id'])->first();
        // pun id-ul userului autentificat in variabila $authenticatedId
        $authenticatedId = Auth::id();
        // daca nu e autentificat nimeni pun null in baza de date null -> fac asta cu ??
        $dataFrontend['user_id'] = $authenticatedId ?? null;
        // creez un format de date bun pentru calendarul de pe frontend
        $dataFrontend['start'] = Carbon::createFromDate($dataFrontend['start'])->format('Y-m-d\TH:i');
        // creez data de sfarsit adaugand la data de start durata serviciului.
        // Aici am durata serviciului -> $service->duration
        // Asa formatez data ->format('Y-m-d\TH:i') Year-month-day
        $dataFrontend['end'] = Carbon::createFromDate($dataFrontend['start'])->addMinutes($service->duration)->format('Y-m-d\TH:i');
        // fac cast cu (int) -> adica fac din string in int pentru ca tre sa fie int pentru database
        $dataFrontend['service_id'] = (int) $dataFrontend['service_id'];
        // creez titlul care va fi afisat in calendarul unde iti vezi programarile
        $dataFrontend['title'] = $service->name . ' - ' . $dataFrontend['name'] . ' - ' . $dataFrontend['phone_number'] . '        Durata: ' . $service->duration . ' minute';
        // creeez evenimentul in databse
        Event::query()->create($dataFrontend);
        // daca e autentificat il redirectez la pagina evenimentele userului
        if ($authenticatedId) {
            return redirect('/myEvents?event=success');
        }
        // daca nu e autentificat il redirectez la evenimentele tuturor userilor, in admin
        else {
            return redirect('/?event=success');
        }
    }
}
