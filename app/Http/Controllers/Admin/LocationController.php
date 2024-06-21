<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    function construct()
    {
        $this->middleware('role_or_permission:View location|Edit location|Create location|Delete location', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Create location', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Edit location', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Delete location', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::latest()->get();

        return view('settings.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'address' => 'required',
            'name' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
        ]);

        $location = Location::create([
            'name' => $request->name,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
        ]);


        $location->save();

        return redirect()->route('admin.locations.index')->with('success', '✅ Location created successfully!');
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

    public function edit(Location $location)
    {
        return view('settings.locations.edit', ['location' => $location]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
//        dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
        ]);

        $location->update([
            'name' => $request->name,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
        ]);

        $location->save();

        return redirect()->route('admin.locations.index')->with('success', '✅ Location updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->back()->with('success', '✅ Location deleted successfully!');
    }

}
