<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductMemoryRequest;
use App\Models\Memory;
use App\Models\Product;
use App\Models\ProductMemory;
use Illuminate\Http\Request;

class ProductMemoryController extends Controller
{
    public function destroy(Memory $memory, Product $product)
    {
        $productMemory = ProductMemory::where([
            ['memory_id', '=', $memory->id],
            ['product_id', '=', $product->id]
        ])->firstOrFail();

        $productMemory->delete();

        return redirect()->back()->with('success', 'Relação entre produto e memória removida com sucesso.');
    }

    public function store(StoreProductMemoryRequest $request, Memory $memory)
    {
        $validated = $request->validated();

        $productIds = $validated['products'];

        $productMemoriesData = [];

        foreach ($productIds as $productId) {
            $productMemoriesData[] = [
                'product_id' => $productId,
                'memory_id' => $memory->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $existingProductIds = $memory->products()->whereIn('product_id', $productIds)->pluck('product_id')->toArray();

        if (count($existingProductIds) > 0) {
            return redirect()->back()
                ->withErrors(['products' => 'Alguns produtos já estão relacionados a esta memória.'])
                ->withInput();
        }

        ProductMemory::insert($productMemoriesData);

        return redirect()->back()->with('success', 'Produtos relacionados a memória com sucesso!');
    }
}
