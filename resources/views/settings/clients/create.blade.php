<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.clients.store') }}">
                        @csrf

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input id="first_name" name="first_name" type="text" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" :value="old('first_name')" required autofocus autocomplete="given-name" />
                            <x-input-error :messages="$errors->get('first_name')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input id="last_name" name="last_name" type="text" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" :value="old('last_name')" required autofocus autocomplete="family-name" />
                            <x-input-error :messages="$errors->get('last_name')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" :value="old('email')" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" maxlength="10" name="phone_number" type="tel" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" :value="old('phone_number')" autocomplete="tel" />
                            <x-input-error :messages="$errors->get('phone_number')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" :value="old('address')" autocomplete="address-line1" />
                            <x-input-error :messages="$errors->get('address')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="postal_code" :value="__('Postcode')" />
                            <x-text-input id="postal_code" maxlength="6" name="postal_code" type="text" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" :value="old('postal_code')" autocomplete="postal-code" />
                            <x-input-error :messages="$errors->get('postal_code')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="city" :value="__('City')" />
                            <x-text-input id="city" name="city" type="text" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" :value="old('city')" autocomplete="address-level2" />
                            <x-input-error :messages="$errors->get('city')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" :value="old('date_of_birth')" :max="now()->subYears(16)->format('Y-m-d')" required autocomplete="bday" />
                            <x-input-error :messages="$errors->get('date_of_birth')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="subscription" class="text-gray-700 select-none font-medium">Subscription</label>
                            <select id="subscription" name="subscription"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                    <option value="">Select a subscription (optional)</option>
                                @foreach($subscriptions as $subscription)
                                    <option value="{{ $subscription->id }}">{{ $subscription->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" name="password" type="password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" />
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
