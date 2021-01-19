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
        $payload = $request->input();
        $userId = Auth::id();
        $payload['user_id'] = $userId;

        Review::query()->create($payload);

        return redirect('/home?event=successReview');
    }

    public function editReview(Request $request)
    {
        $review = Review::find($request->input('id'));

        $review->active  = $request->input('active') === 'true';
        $review->save();

        return $review;
    }

    public function deleteReview(Request $request)
    {
        $review = Review::find($request->input('id'));

        $review->delete();
    }

}
