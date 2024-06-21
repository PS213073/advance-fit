<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        @csrf
                        @method('put')

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input id="first_name" name="first_name" type="text" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                :value="old('first_name', $user->first_name)" placeholder="First Name" required autofocus autocomplete="given-name" />
                            <x-input-error :messages="$errors->get('first_name')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input id="last_name" name="last_name" type="text" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                :value="old('last_name', $user->last_name)" placeholder="Last Name" required autocomplete="family-name" />
                            <x-input-error :messages="$errors->get('last_name')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                :value="old('email', $user->email)" placeholder="Email Address" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" name="phone_number" type="text" maxlength="10" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                :value="old('phone_number', $user->phone_number)" placeholder="Phone Number" autocomplete="tel" />
                            <x-input-error :messages="$errors->get('phone_number')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                :value="old('address', $user->address)" placeholder="Address" autocomplete="address-line1" />
                            <x-input-error :messages="$errors->get('address')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="postal_code" :value="__('Postcode')" />
                            <x-text-input id="postal_code" name="postal_code" type="text" maxlength="6" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                :value="old('postal_code', $user->postal_code)" placeholder="Postcode" autocomplete="postal-code" />
                            <x-input-error :messages="$errors->get('postal_code')" />
                        </div>

                        
                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="city" :value="__('City')" />
                            <x-text-input id="city" name="city" type="text" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                :value="old('city', $user->city)" placeholder="City" autocomplete="address-level2" />
                            <x-input-error :messages="$errors->get('city')" />
                        </div>

                     
                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                            <x-text-input id="date_of_birth" name="date_of_birth" type="date" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                :value="old('date_of_birth', optional($user->date_of_birth)->format('Y-m-d'))" 
                                :max="now()->subYears(16)->format('Y-m-d')" placeholder="Date of Birth" required autocomplete="bday" />
                            <x-input-error :messages="$errors->get('date_of_birth')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="hire_date" :value="__('Hire Date')" />
                            <x-text-input id="hire_date" name="hire_date" type="date" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                :value="old('hire_date', optional($user->hire_date)->format('Y-m-d'))" 
                                :max="now()->format('Y-m-d')" placeholder="Hire Date" autocomplete="bday" />
                            <x-input-error :messages="$errors->get('hire_date')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" name="password" type="password" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                placeholder="Password" autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" 
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                placeholder="Confirm Password" autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" />
                        </div>

                        <h3 class="text-xl my-4 text-gray-600">Roles</h3>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach ($roles as $role)
                                <div class="flex flex-col justify-center">
                                    <label class="inline-flex items-center mt-3">
                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                                            name="roles[]" value="{{ $role->id }}"
                                            @if ($user->roles->contains($role->id)) checked @endif>
                                        <span class="ml-2 text-gray-700">{{ $role->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-16 mb-16">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
