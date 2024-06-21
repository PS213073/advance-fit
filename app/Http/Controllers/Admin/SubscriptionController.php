<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use App\Models\Subscription;

class SubscriptionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function construct()
    {
        $this->middleware('role_or_permission:View subscription|Edit subscription|Create subscription|Delete subscription', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Create subscription', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Edit subscription', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Delete subscription', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::all();
        $frontusers = Frontuser::all();
        return view('settings.subscriptions.index', ['subscriptions' => $subscriptions, 'frontusers' => $frontusers]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Subscription $subscription)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $subscription::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.subscriptions.index')->with('success', '✅ Subscriptions created successfully!');
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
    public function edit(Subscription $subscription)
    {
        return view('settings.subscriptions.edit', ['subscription' => $subscription]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $subscription->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        $subscription->save();

        return redirect()->route('admin.subscriptions.index')->with('success', '✅ Subscriptions updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('admin.subscriptions.index')->with('success', '✅ Subscriptions deleted successfully!');
    }
}
