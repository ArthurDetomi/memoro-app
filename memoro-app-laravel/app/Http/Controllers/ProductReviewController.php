<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreProductReviewRequest;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $reviews = Review::where(function ($q) use ($product) {
            $q->where('product_type_id', $product->type_id)
                ->orWhere('product_type_id', null);
        })->orderBy('name')->get();

        $productReviewMap = $product->reviews()->get()->keyBy('review_id');

        return view('productReview.index', compact('product', 'reviews', 'productReviewMap'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource or update case exists in storage.
     */
    public function store(StoreProductReviewRequest $request, Product $product)
    {

        $validated = $request->validated();

        $reviewsMap = $validated['reviews'];
        $reviewCommentsMap = $validated['reviews_comments'];

        foreach ($reviewsMap as $reviewId => $rating) {
            // Essa query pode ser melhorada, para que não tenha query dentro de um for, mas vou considerar que seria uma otimização prematura
            ProductReview::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'review_id' => $reviewId,
                    'rating' => $rating,
                    'comment' => $reviewCommentsMap[$reviewId]
                ]
            );
        }

        $product->average_rating = $product->reviews()->avg('rating');
        $product->save();

        return redirect()->route('products.index')->with('success', "Produto $product->name avaliado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
