<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageMemoryRequest;
use App\Models\ImageMemory;
use App\Models\Memory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ImageMemoryController extends Controller
{

    public function store(StoreImageMemoryRequest $request, Memory $memory)
    {
        Gate::authorize('update', $memory);

        $imageData = [];

        foreach ($request->file('images') as $imageFile) {
            $path = $imageFile->store('memories', 'public');

            $imageData[] = [
                'memory_id' => $memory->id,
                'image' => $path,
                'caption' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        ImageMemory::insert($imageData);

        return redirect()->route('memories.edit', parameters: $memory)->with('success', 'Imagens adicionadas com sucesso!');
    }

    public function destroy(ImageMemory $imageMemory)
    {
        Gate::authorize('delete', $imageMemory);

        $memory = $imageMemory->memory;

        if ($memory->images()->count() <= 1) {
            return redirect()->back()->with('error', 'A imagem não pode ser excluída. Uma memória deve ter pelo menos uma imagem.');
        }

        Storage::disk('public')->delete($imageMemory->image);

        $imageMemory->delete();

        return redirect()->back()->with('success', 'Imagem removida com sucesso!');
    }
}
