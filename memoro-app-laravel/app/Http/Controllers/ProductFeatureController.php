<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductFeatureController extends Controller
{
    public function index()
    {
        // TODO: Fazer o gate
        $products_types = ProductType::all();

        return view('productFeature.index', compact('products_types'));
    }
}
