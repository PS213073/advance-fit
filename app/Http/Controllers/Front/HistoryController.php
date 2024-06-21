<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $checkins = $user->checkins()->with('location')->get();

        return view('front.history', compact('checkins'));
    }

}
