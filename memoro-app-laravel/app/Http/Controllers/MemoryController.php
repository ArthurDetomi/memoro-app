<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemoryRequest;
use App\Http\Requests\UpdateMemoryRequest;
use App\Models\ImageMemory;
use App\Models\Memory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class MemoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $memories = $user->memories()->orderBy('created_at', 'DESC')->get();

        return view('memories.index', compact('memories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('memories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemoryRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        DB::beginTransaction();

        try {
            $memory = Memory::create([
                'user_id' => $validated['user_id'],
                'title' => $validated['title'],
                'description' => $validated['description'],
            ]);

            if (request()->has('images')) {
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
            }

            DB::commit();

            return redirect()->route('memories.show', $memory)->with('success', 'Memória cadastrada com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Ocorreu um erro ao cadastrar a memória. Tente novamente.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Memory $memory)
    {
        Gate::authorize('view', $memory);

        return view('memories.show', compact('memory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memory $memory)
    {
        Gate::authorize('update', $memory);

        return view('memories.edit', compact('memory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemoryRequest $request, Memory $memory)
    {
        Gate::authorize('update', $memory);

        $validated = $request->validated();

        $memory->update([
            'title' => $validated['title'],
            'description' => $validated['description']
        ]);

        return redirect()->back()->with('success', 'Informações da memória foram atualizadas com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memory $memory)
    {
        Gate::authorize('delete', $memory);

        DB::beginTransaction();

        try {
            foreach ($memory->images as $image) {
                Storage::disk('public')->delete($image->image);
            }

            $memory->delete();

            DB::commit();

            return redirect()->route('memories.index')->with('success', 'Memory deleted successfully!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('memories.index')->withErrors(['error' => 'Error deleting memory']);
        }
    }
}
