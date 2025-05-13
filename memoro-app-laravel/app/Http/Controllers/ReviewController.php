<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $products_types = ProductType::all();

        return view('review.index', compact('products_types'));
    }
}
