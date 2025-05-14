<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $productTypeId = $request->input('product_type_id');

        $productsTypes = ProductType::all();

        $reviews = Review::with('user')
            ->where(function ($query) {
                $query->where('user_id', Auth::id())
                    ->orWhereNull('user_id');
            })
            ->where('product_type_id', $productTypeId)
            ->orderByRaw('user_id IS NULL') // globais por último
            ->get();


        return view('review.index', compact('productsTypes', 'reviews'));
    }

    public function store(StoreReviewRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        Review::create($validated);

        return redirect()->back()->with('success', 'Review cadastrada com sucesso!');
    }

    public function destroy(Review $review)
    {
        Gate::authorize('delete', $review);

        foreach ($review->productReviews as $productReview) {
            $product = $productReview->product;

            $product->average_rating = $product->reviews()->avg('rating');

            $product->save();
        }


        $review->delete();

        return redirect()->back()->with('success', 'Review deletada com sucesso!');
    }
}
