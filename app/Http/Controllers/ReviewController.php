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
        $dataFrontent = $request->input();
        $userId = Auth::id();
        $dataFrontent['user_id'] = $userId;

        Review::query()->create($dataFrontent);

        return redirect('/home?event=successReview');
    }

    public function editReview(Request $request, $id)
    {
        $review = Review::find($id);
        $active = $request->input('active');
        $activeValue = $active === 'true';

        if ($active) {
            $review->active = $activeValue;
        }

        $review->update($request->input());
        $review->save();

        if ($active) {
            return $review;
        }

        return redirect('/reviews');
    }

    public function deleteReview(Request $request)
    {
        $review = Review::find($request->input('id'));

        $review->delete();
    }

}
