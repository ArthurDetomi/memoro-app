<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Memory;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Memory $memory)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['memory_id'] = $memory->id;

        Comment::create($validated);

        return redirect()->route('memories.show', $memory->id)->with('success', 'Comentário postado com sucesso!');
    }
}
