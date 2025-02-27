<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemoryRequest;
use App\Models\ImageMemory;
use App\Models\Memory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MemoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('memories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}

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

            return response()->json(['success' => true, 'message' => 'Memória salva com sucesso!']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Erro ao salvar memória.', 'error' => $e->getMessage()], 500);
        }
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
