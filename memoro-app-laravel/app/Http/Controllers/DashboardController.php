<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*
    public function index()
    {
        $ideas = Idea::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy('created_at', 'DESC')->paginate(5);

        return view("dashboard", ["ideas" => $ideas]);
    }
    */
    public function index()
    {
        $memories = Memory::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy('created_at', 'DESC')->paginate(5);

        return view("dashboard", compact('memories'));
    }
}
