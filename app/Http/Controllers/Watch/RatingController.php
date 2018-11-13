<?php

namespace App\Http\Controllers\Watch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'content' => $request->content,
            'point' => $request->point,
        ];
        Rating::insert($data);

        $product = Product::findorfail($request->product_id);
        $avg = Rating::groupBy('product_id')->having('product_id', '=', $request->product_id)->avg('point');
        $product->rating = $avg;
        $product->save();
        $review = Rating::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $request->product_id)->orderBy('id', 'DESC')->first();

        return view('watch.change_review', compact('review'));
    }

    public function changeRating(Request $request)
    {
        $product = Product::findorfail($request->product_id);

        return view('watch.change_rating', compact('product'));
    }
}
