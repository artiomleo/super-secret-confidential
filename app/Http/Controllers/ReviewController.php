<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function reviewCreate(Request $request)
    {
        $dataFrontend = $request->input();
        $userId = Auth::id();
        $dataFrontend['user_id'] = $userId;
        // creez un review
        Review::query()->create($dataFrontend);

        return redirect('/home?event=successReview');
    }

    public function editReview(Request $request, $id)
    {
        $review = Review::find($id);
        $active = $request->input('active');
        // transform valoarea active din string in integer
        $activeValue = $active === 'true';

        if ($active) {
            $review->active = $activeValue;
        }
        // editez un review
        $review->update($request->input());
        // salvez
        $review->save();

        return redirect('/reviews');
    }

    public function deleteReview(Request $request)
    {
        $review = Review::find($request->input('id'));
        // sterg review
        $review->delete();
    }

}
