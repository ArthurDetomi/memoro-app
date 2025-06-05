<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        $followingIds = $user->followings()->pluck("user_id");

        $memories = Memory::whereIn('user_id', $followingIds)->orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $memories = $memories->search(request('search', ''));
        }

        return view("dashboard", ["memories" => $memories->paginate(5)]);
    }
}
