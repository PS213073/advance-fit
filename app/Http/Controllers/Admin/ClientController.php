<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\FrontProfileUpdateRequest;
use App\Models\Frontuser;
use App\Models\Location;
use App\Models\Subscription;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    function construct()
    {
        $this->middleware('role_or_permission:View client|Edit client|Create client|Delete client', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Create client', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Edit client', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Delete client', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Frontuser::all();
        $subscriptions = Subscription::all();
        return view('settings.clients.index', compact('clients', 'subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        $subscriptions = Subscription::all();
        return view('settings.clients.create', compact('locations', 'subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:frontusers,email',
            'phone_number' => 'nullable|numeric|digits:10',
            'address' => 'nullable',
            'postal_code' => 'nullable|regex:/^[0-9]{4}[a-zA-Z]{2}$/',
            'city' => 'nullable',
            'date_of_birth' => 'required',
            'subscription_id' => 'nullable',
            'password' => 'required|confirmed',
        ]);

        $client = Frontuser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'date_of_birth' => $request->date_of_birth,
            'subscription_id' => $request->subscription_id,
            'password' => bcrypt($request->password),
        ]);

        //        $client->locations()->sync($request->input('locations', []));
        $client->save();

        return redirect()->route('admin.clients.index')->with('success','✅ Client created successfully!');
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
    public function edit(Frontuser $client)
    {
        $subscriptions = Subscription::all();
        return view('settings.clients.edit', compact('client', 'subscriptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Frontuser $client)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:frontusers,email,' . $client->id,
            'phone_number' => 'nullable|numeric|digits:10',
            'address' => 'nullable',
            'postal_code' => 'nullable|regex:/^[0-9]{4}[a-zA-Z]{2}$/',
            'city' => 'nullable',
            'date_of_birth' => 'required',
            'subscription_id' => 'nullable',
        ]);

        $client->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'date_of_birth' => $request->date_of_birth,
            'subscription_id' => $request->subscription_id,
        ]);

        // $client->locations()->sync($request->input('locations', []));
        $client->save();

        return redirect()->route('admin.clients.index')->with('success','✅ Client updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Frontuser::find($id);
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success','✅ Client deleted successfully!');
    }
}
