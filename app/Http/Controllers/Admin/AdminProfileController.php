<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

     public function edit()
    {
        $user = auth()->user();
        return view('admin.profile.edit', compact('user'));
    }


    // public function update(Request $request)
    // {
    //     $user = auth()->user();

    //     $validated = $request->validate([
    //         'name'=>'required',
    //         'email' => 'required|email|unique:users,email,'.$user->id.',id',
    //     ]);



    //     if($request->password != null){
    //         $request->validate([
    //             'password' => 'required|confirmed'
    //         ]);
    //         $validated['password'] = bcrypt($request->password);
    //     }

    //     if($request->hasFile('profile')){
    //         if($name = $this->saveImage($request->profile)){
    //             $validated['profile'] = $name;
    //         }
    //     }

    //     // $user->update($validated);

    //     return redirect()->back()->withSuccess('User updated !!!');
    // }

    public function update(AdminProfileUpdateRequest $request)
    {

        $user = $request->user();
        $validated = $request->validated();

        if ($request->password != null) {
            $validated['password'] = bcrypt($request->password);
        }

        if ($user->isDirty('email')) {
            $validated['email_verified_at'] = null;
        }
        $user->fill($validated);
        $user->save();

        return redirect()->back()->withSuccess('User Profile updated !!!');
    }
}
