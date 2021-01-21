<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FullCalendarController extends Controller
{

    public function index(Request $request)
    {
        // pun userul autentificat in variabila $user
        $user = Auth::user();

        if (request()->ajax()) {
            // formatez data de start si end comoda pentru calendar
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            // daca e admin dau programarile tuturor userilor -> User.php linia 46
            if (!$user->isAdmin()) {
                $data = $this->getUserEvents($user, $start, $end);
            // daca nu e admin dau programarile userului logat
            } else {
                $data = $this->getAllEvents($start, $end);
            }
            // raspund cu json pentru frontend
            return response()->json($data);
        }

        return view('fullcalender');
    }

    public function getAllEvents($start, $end)
    {
        // fac un query in database care imi returneaza programarile care e afisata pe frontend
        return Event::query()->whereDate('start', '>=', $start)
            ->whereDate('end', '<=', $end)
            ->get(['id', 'title', 'start', 'end', 'phone_number']);
    }

    public function getUserEvents($user, $start, $end)
    {
        // fac un query in database care imi returneaza programarile userului logat care e afisata pe frontend
        return Event::query()->where('user_id', $user->id)->whereDate('start', '>=', $start)
            ->whereDate('end', '<=', $end)
            ->get(['id', 'title', 'start', 'end', 'phone_number']);
    }

    public function update(Request $request)
    {
        // continutul query-ului
        $where = array('id' => $request->id);
        // continutul query-ului
        $updateArr = ['title' => $request->title, 'start' => $request->start, 'end' => $request->end];
        // fac un query in database care imi updateaza data programarea care il mut cu mouse-ul in calendar
        $event = Event::query()->where($where)->update($updateArr);

        return response()->json($event);
    }


    public function destroy(Request $request)
    {
        // fac un query in database care imi sterge programarea din calendar
        $event = Event::query()->where('id', $request->id)->delete();

        return response()->json($event);
    }
}
