<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function construct()
    {
        $this->middleware('role_or_permission:View employee|Edit employee|Create employee|Delete employee', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Create employee', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Edit employee', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Delete employee', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $users = User::latest()->get();

        return view('settings.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $users = User::get();
        $roles = Role::get();
        return view('settings.users.create', compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'nullable|numeric|digits:10',
            'address' => 'nullable',
            'postal_code' => 'nullable|regex:/^[0-9]{4}[a-zA-Z]{2}$/',
            'city' => 'nullable',
            'date_of_birth' => 'required|date|before_or_equal:'.now()->subYears(16)->format('Y-m-d'),
            'hire_date' => 'required|date|before_or_equal:'.now()->format('Y-m-d'),
            'password' => 'required|confirmed',


        ]);


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'date_of_birth' => $request->date_of_birth,
            'hire_date' => $request->hire_date,
            'password' => bcrypt($request->password),

        ]);



        $roleNames = Role::whereIn('id', $request->roles)->pluck('name');
        $user->syncRoles($roleNames);

        return redirect()->route('admin.users.index')->withSuccess('User created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user): View
    {
        $role = Role::get();
        $user->roles;
        return view('settings.users.edit', ['user' => $user, 'roles' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
        ]);

        if ($request->password != null) {
            $request->validate([
                'password' => 'required|confirmed'
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        $user->update($validated);

        $roleNames = Role::whereIn('id', $request->roles)->pluck('name');
        $user->syncRoles($roleNames);

        return redirect()->route('admin.users.index')->with('success', '✅ User updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', '✅ User deleted !!!');
    }
}
