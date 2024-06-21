<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\MuscleGroup;

class MuscleGroupController extends Controller
{
    function construct()
    {
        $this->middleware('role_or_permission:View muscle group|Edit muscle group|Create muscle group|Delete muscle group', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Create muscle group', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Edit muscle group', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Delete muscle group', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musclesGroups = MuscleGroup::all();
        return view('settings.muscleGroups.index', ['musclesGroups' => $musclesGroups]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.muscleGroups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $muscleGroup = MuscleGroup::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.muscleGroups.index')->withSuccess('Muscle Group updated !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $muscleGroup = MuscleGroup::findOrFail($id);
        return view('settings.muscleGroups.show', compact('muscleGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $muscleGroup = MuscleGroup::findOrFail($id);
        return view('settings.muscleGroups.edit', compact('muscleGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $muscleGroup = MuscleGroup::findOrFail($id);
        $muscleGroup->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.muscleGroups.index')->withSuccess('Muscle Group updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $muscleGroup = MuscleGroup::findOrFail($id);
        $muscleGroup->delete();
        return redirect()->route('admin.muscleGroups.index')->withSuccess('Muscle Group deleted !!!');
    }
}
