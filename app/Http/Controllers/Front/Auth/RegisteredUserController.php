<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('front.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Frontuser::class],
            'phone_number' => ['nullable', 'numeric', 'digits:10'],
            'address' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'regex:/^[0-9]{4}[a-zA-Z]{2}$/'],
            'city' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Frontuser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'date_of_birth' => $request->date_of_birth,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('front')->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
