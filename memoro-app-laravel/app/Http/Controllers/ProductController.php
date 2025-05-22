<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $user = Auth::user();

        $query = $user->products()->orderBy('created_at', 'DESC');

        if ($request->has('search')) {
            $search = $request->get('search', '');

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhereHas('type', function ($q2) use ($search) {
                        $q2->where('name', 'like', "%$search%");
                    });
            });
        }

        $products = $query->paginate(5);

        $products_types = ProductType::all();

        $hasProductsRegistered = $user->products()->exists();

        return view('products.index', compact('products_types', 'products', 'hasProductsRegistered'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products_types = ProductType::all();

        return view('products.create', compact('products_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('product', 'public');
            $validated['image'] = $imagePath;
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        Gate::authorize('view', $product);

        $features = Feature::with('user')
            ->where('user_id', '=', Auth::id())
            ->where('type_id', $product->type_id)
            ->orderByRaw('user_id IS NULL')
            ->get();

        $productFeatureMap = $product->features()->get()->keyBy('feature_id');

        return view('products.show', compact('product', 'features', 'productFeatureMap'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Gate::authorize('update', $product);

        $products_types = ProductType::all();

        $features = Feature::with('user')
            ->where('user_id', '=', Auth::id())
            ->where('type_id', $product->type_id)
            ->orderByRaw('user_id IS NULL')
            ->get();

        $productFeatureMap = $product->features()->get()->keyBy('feature_id');

        //dd($features, $productFeatureMap);

        return view('products.edit', compact('product', 'products_types', 'features', 'productFeatureMap'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        Gate::authorize('update', $product);

        $validated = $request->validated();

        DB::transaction(function () use ($request, $product, &$validated) {
            if (request()->has('image')) {
                $oldImagePath = $product->image;

                $imagePath = $request->file('image')->store('product', 'public');
                $validated['image'] = $imagePath;

                if ($oldImagePath) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }

            $features = Feature::with('user')
                ->where('user_id', '=', Auth::id())
                ->where('type_id', $product->type_id)
                ->get();


            foreach ($features as $feature) {
                $nameFeatureForm = Str::slug($feature->name);


                if (request()->has($nameFeatureForm)) {
                    ProductFeature::updateOrCreate(
                        [
                            'product_id' => $product->id,
                            'feature_id' => $feature->id
                        ],
                        [
                            'value' => request()->get($nameFeatureForm),
                        ]
                    );
                }
            }

            $product->update($validated);
        });

        return redirect()->route('products.show', $product)->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product);

        $product->delete();

        return redirect()->route('products.index')->with('success', value: "Product with name $product->name deleted successfully!");
    }

    public function consume(Request $request, Product $product)
    {
        Gate::authorize('update', $product);

        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . $product->quantity],
        ]);

        $quantity = $validated['quantity'];

        $product->update(['quantity' => $product->quantity - $quantity]);

        return redirect()->route('products.index')->with('success', "Product with name $product->name consumed successfully!");
    }

    public function settings()
    {
        // TODO: Criar um novo gate
        return view('products.settings.index');
    }
}
