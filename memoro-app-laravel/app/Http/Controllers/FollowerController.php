<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = Auth::user();

        $follower->followings()->attach($user);

        return redirect()->route('users.show', $user->id)->with('success', 'followed successfully!');
    }

    public function unfollow(User $user)
    {
        $follower = Auth::user();

        $follower->followings()->detach($user);

        return redirect()->route('users.show', $user->id)->with('success', 'unfollowed successfully!');
    }
}
