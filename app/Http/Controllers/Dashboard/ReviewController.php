<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::with(['user', 'product'])->get();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $review = Review::with('user', 'product', 'product.skus')->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        Session::flash('message', 'Review Deleted Successfully!');
        return redirect()->route('reviews.index');
    }
}
