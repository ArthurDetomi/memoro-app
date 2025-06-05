<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MemoryLikeController extends Controller
{
    public function like(Memory $memory)
    {
        $liker = Auth::user();

        $liker->likes()->attach($memory->id);

        return redirect()->route('dashboard')->with("success", "Curtido com sucesso!");
    }

    public function unlike(Memory $memory)
    {
        $liker = Auth::user();

        $liker->likes()->detach($memory->id);

        return redirect()->route('dashboard')->with("success", "Descurtido com sucesso!");
    }
}
