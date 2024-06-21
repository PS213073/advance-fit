<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\MuscleGroup;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function construct()
    {        // Voegt middleware toe voor rol- of permissiecontrole op verschillende acties
        $this->middleware('role_or_permission:View exercise|Edit exercise|Create exercise|Delete exercise', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Create exercise', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Edit exercise', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Delete exercise', ['only' => ['destroy']]);
    }

    public function index()
    {
        $exercises = Exercise::all(); // Haalt alle oefeningen op uit de database
        return view('settings.exercises.index', ['exercises' => $exercises]);// Retourneert de view met de oefeningen
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $muscleGroups = MuscleGroup::get();
        return view('settings.exercises.create', compact('muscleGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)// Methode om een nieuwe oefening op te slaan
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'video_tutorial' => 'nullable|url',
        ]);

        // Maakt een nieuwe oefening aan met de gevalideerde data
        $exercise = Exercise::create([
            'name' => $request->name,
            'video_tutorial' => $request->video_tutorial,
        ]);
        // Koppelt de geselecteerde spiergroepen aan de oefening
        if ($request->input('muscleGroups')) {
            $exercise->muscleGroups()->attach($request->input('muscleGroups'));
        }
        // Redirects naar de index pagina met een succesbericht
        return redirect()->route('admin.exercises.index')->with('success', 'Exercise created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        $muscleGroups = MuscleGroup::get();
        return view('settings.exercises.edit', compact('exercise', 'muscleGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise $exercise)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'video_tutorial' => 'nullable|url',
        ]);
        // Werk de spiergroepen van de oefening bij
        if ($request->input('muscleGroups')) {
            $exercise->muscleGroups()->sync($request->input('muscleGroups'));
        }

        return redirect()->route('admin.exercises.index')->with('success', 'Exercise updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('admin.exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}