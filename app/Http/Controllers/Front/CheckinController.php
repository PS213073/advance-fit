<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::latest()->get();

        return view('front.checkin', ['locations' => $locations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
        ]);

        $user = auth()->user();

        // Get the user's last check-in
        $lastCheckin = $user->checkins()->latest()->first();

        // If the user has checked in before and the last check-in was less than 5 hours ago
        if ($lastCheckin && $lastCheckin->created_at->gt(Carbon::now()->subHours(5))) {
            return back()->withErrors('⚠️ You can only check in once every 5 hours.');
        }

        $user->checkins()->create([
            'location_id' => $request->location_id,
        ]);

        return redirect()->route('front.checkin.index')->with('success', 'Check-in successful!');
    }


}
