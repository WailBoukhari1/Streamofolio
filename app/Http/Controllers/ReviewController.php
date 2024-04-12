<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'review-title' => 'required',
            'review-rating' => 'required|numeric|min:1|max:5',
            'review-comment' => 'required',
            'product_id'=> 'required',
        ]);

        $user = Auth::user();
        $review = new Review();
        $review->title = $validatedData['review-title'];
        $review->rating = $validatedData['review-rating'];
        $review->comment = $validatedData['review-comment'];
        $review->user_id = $user->id;
        $review->product_id = $validatedData['product_id'];

        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
