<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ReviewDetailsResource;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(2);
        return new ReviewResource($reviews);
    }

    public function show($id){
        $review = Review::find($id);
        if($review != null){
           return new ReviewDetailsResource($review);
        }
         else{
            return response()->json(['message' => trans('review_not_found')],404);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric|gt:0',
            'user_id' => 'required|numeric|gt:0',
            'content' =>  'required|string|max:2000',
            'rating' => 'required|numeric|gt:0',
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()],400);
        }

        $review = new Review();
        $review->product_id = $request->product_id;
        $review->user_id = $request->user_id;
        $review->content = $request->content;
        $review->rating = $request->rating;
        $review->save();

        return response()->json([
            'status' => 200,
            'message' => 'Review Added Successfully',
            'data' => $review,
         ]);
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return response()->json([
            'status' => 'Success',
            'message'=>'Review Deleted Successfully'
        ],200);
    }
}
