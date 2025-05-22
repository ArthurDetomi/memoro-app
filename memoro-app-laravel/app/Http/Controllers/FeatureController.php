<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeatureRequest;
use App\Models\Feature;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $productTypeId = $request->input('type_id');

        $productsTypes = ProductType::all();

        $features = Feature::with('user')
            ->where('user_id', '=', Auth::id())
            ->where('type_id', $productTypeId)
            ->orderByRaw('user_id IS NULL')
            ->get();


        return view('features.index', compact('productsTypes', 'features'));
    }

    public function store(StoreFeatureRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        Feature::create($validated);

        return redirect()->back()->with('success', 'Característica cadastrada com sucesso!');
    }


    public function destroy(Feature $feature)
    {
        Gate::authorize('delete', $feature);

        $feature->delete();

        return redirect()->back()->with('success', 'Característica deletada com sucesso!');
    }
}
