<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;

class ShiftController extends Controller
{

    function construct()
    {
        $this->middleware('role_or_permission:View shift|Edit shift|Create shift|Delete shift', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Create shift', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Edit shift', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Delete shift', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = [];

        $shifts = Shift::with('user')->get();
        foreach ($shifts as $shift) {
            $events[] = [
                'id' => $shift->id,
                'title' => $shift->user->first_name,
                'start' => date('Y-m-d\TH:i:s', strtotime($shift->date . ' ' . $shift->start_time)),
                'end' => date('Y-m-d\TH:i:s', strtotime($shift->date . ' ' . $shift->finish_time)),
            ];
        }


//         dd($events);

        return view('settings.shifts.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('settings.shifts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'user' => 'required|exists:users,id',
        ]);

        // Check for existing shift with the same user, date, and time
        $existingShift = Shift::where('user_id', $request->user)
            ->where('date', $request->date)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->start_time)
                        ->where('finish_time', '>', $request->start_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->end_time)
                        ->where('finish_time', '>', $request->end_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '>=', $request->start_time)
                        ->where('finish_time', '<=', $request->end_time);
                });
            })
            ->first();

        if ($existingShift) {
            return redirect()->back()->with('error', '⚠️ A shift already exists for the selected user for the specified date and time.');
        }

        // If no existing shift, create a new one
        $shift = new Shift;
        $shift->date = $request->date;
        $shift->start_time = $request->start_time;
        $shift->finish_time = $request->end_time;
        $shift->user_id = $request->user;
        $shift->save();

        return redirect()->route('admin.shifts.index')->with('success', '✅ Shift successfully created!');
    }


    public function edit(Shift $shift)
    {
        $users = User::all();
        return view('settings.shifts.edit', compact('users', 'shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'user' => 'required|exists:users,id',
        ]);
        // Check for existing shift with the same user, date, and time
        $existingShift = Shift::where('user_id', $request->user)
            ->where('date', $request->date)
            ->where('id', '!=', $shift->id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->start_time)
                        ->where('finish_time', '>', $request->start_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->end_time)
                        ->where('finish_time', '>', $request->end_time);
                })->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '>=', $request->start_time)
                        ->where('finish_time', '<=', $request->end_time);
                });
            })
            ->first();

        if ($existingShift) {
            return redirect()->back()->with('error', '⚠️ A shift already exists for the selected user for the specified date and time.');
        }

        // If no existing shift, update the shift
        $shift->date = $request->date;
        $shift->start_time = $request->start_time;
        $shift->finish_time = $request->end_time;
        $shift->user_id = $request->user;
        $shift->save();

        return redirect()->route('admin.shifts.index')->with('success', '✅ Shift successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();

        return redirect()->route('admin.shifts.index')
            ->with('success', '✅ Shift deleted successfully');
    }
}
