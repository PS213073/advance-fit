<?php

namespace App\Http\Requests\Front;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FrontProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'lowercase', 'max:50', 'unique:users,email,' . auth()->user()->id],
            'phone_number' => ['nullable', 'numeric', 'digits:10'],
            'address' => ['max:255'],
            'postal_code' => ['nullable', 'regex:/^[0-9]{4}[a-zA-Z]{2}$/'],
            'city' => ['max:50'],
            'date_of_birth' => ['date'],
            'subscription_id' => ['nullable']
        ];
    }
}
