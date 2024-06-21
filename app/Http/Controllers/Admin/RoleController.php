<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Gate;
use Illuminate\Contracts\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function construct()
    {
        $this->middleware('role_or_permission:View role|Edit role|Create role|Delete role', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Create role', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Edit role', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Delete role', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $roles = Role::latest()->get();
        // dd($role);
        return view('settings.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $permissions = Permission::get();
        return view('settings.roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        $role = Role::create(['name' => $request->name]);

        $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name');
        $role->syncPermissions($permissionNames);

        return redirect()->route('admin.roles.index')->withSuccess('Role created !!!');
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
    public function edit(Role $role): View
    {
        $permission = Permission::get();
        $role->permissions;
        return view('settings.roles.edit', ['role' => $role, 'permissions' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name]);

        // first check if $request->permissions is an array before passing it to the whereIn method ⬇️
        $permissionIds = is_array($request->permissions) ? $request->permissions : [];
        $permissionNames = Permission::whereIn('id', $permissionIds)->pluck('name');
        $role->syncPermissions($permissionNames);

        return redirect()->route('admin.roles.index')->withSuccess('Role updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->withSuccess('Role deleted !!!');
    }
}
