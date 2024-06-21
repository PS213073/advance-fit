<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'lowercase', 'email', 'max:50', 'unique:users,email,' . auth()->user()->id],
            'phone_number' => ['nullable', 'numeric', 'digits:10'],
            'address' => ['max:255'],
            'postal_code' => ['nullable', 'regex:/^[0-9]{4}[a-zA-Z]{2}$/'],
            'city' => ['max:50'],
            'date_of_birth' => ['date'],
            'hire_date' => ['nullable', 'date'],
        ];
    }

   
}
