<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FullCalendarController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

        if (request()->ajax()) {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

            if (!$user->isAdmin()) {
                $data = $this->getUserEvents($user, $start, $end);
            } else {
                $data = $this->getAllEvents($start, $end);
            }

            return response()->json($data);
        }

        return view('fullcalender');
    }

    public function getAllEvents($start, $end)
    {
        return Event::query()->whereDate('start', '>=', $start)
            ->whereDate('end', '<=', $end)
            ->get(['id', 'title', 'start', 'end']);
    }

    public function getUserEvents($user, $start, $end)
    {
        return $user->events()->whereDate('start', '>=', $start)
            ->whereDate('end', '<=', $end)
            ->get(['id', 'title', 'start', 'end']);
    }

    public function create(Request $request)
    {
        $event = Event::query()->where('start_time',  $request->start)->first();

        if ($event) {
            return 'ceva message de eroare';
        }

        $user = $request->user();

        $insertArr = [
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'user_id' => $user->id
        ];
        $event = Event::insert($insertArr);

        return response()->json($event);
    }


    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title, 'start' => $request->start, 'end' => $request->end];
        $event = Event::where($where)->update($updateArr);

        return response()->json($event);
    }


    public function destroy(Request $request)
    {
        $event = Event::where('id', $request->id)->delete();

        return response()->json($event);
    }
}
