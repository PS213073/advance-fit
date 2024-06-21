<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.clients.update', $client->id) }}">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="first_name" class="text-gray-700 select-none font-medium">First Name</label>
                            <input id="first_name" type="text" name="first_name"
                                   value="{{ old('first_name', $client->first_name) }}" placeholder="first name"
                                   class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 mb-3"/>
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="last_name" class="text-gray-700 select-none font-medium">Last Name</label>
                            <input id="last_name" type="text" name="last_name"
                                   value="{{ old('last_name', $client->last_name) }}" placeholder="last name"
                                   class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 mb-3"/>
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                            <input id="email" type="text" name="email"
                                value="{{ old('email', $client->email) }}" placeholder="email address"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 mb-3" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="phone_number" class="text-gray-700 select-none font-medium">Phone number</label>
                            <input id="phone_number" maxlength="10" type="tel" name="phone_number"
                                value="{{ old('phone_number', $client->phone_number) }}" placeholder="phone number"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="address" class="text-gray-700 select-none font-medium">Address</label>
                            <input id="address" type="text" name="address"
                                value="{{ old('address', $client->address) }}" placeholder="address"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="postal_code" class="text-gray-700 select-none font-medium">Postcode</label>
                            <input id="postal_code" maxlength="6" type="text" name="postal_code"
                                value="{{ old('postal_code', $client->postal_code) }}" placeholder="postal_code"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="city" class="text-gray-700 select-none font-medium">City</label>
                            <input id="city" type="text" name="city" value="{{ old('city', $client->city) }}"
                                placeholder="city"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="subscription" class="text-gray-700 select-none font-medium">Subscription</label>
                            <select id="subscription" name="subscription_id" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                <option value="">Select a subscription (optional)</option>
                                @foreach($subscriptions as $subscription)
                                    <option value="{{ $subscription->id }}" {{ $client->subscription_id == $subscription->id ? 'selected' : '' }}>{{ $subscription->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="date_of_birth" class="text-gray-700 select-none font-medium">Date of
                                birth</label>
                            <input id="date_of_birth" type="date" name="date_of_birth"
                                value="{{ old('date_of_birth', $client->date_of_birth) }}"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="password" class="text-gray-700 select-none font-medium">Password</label>
                            <input id="password" type="text" name="password" value="{{ old('password') }}"
                                   placeholder="password"
                                   class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"/>
                        </div>

                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="password_confirmation" class="text-gray-700 select-none font-medium">Confirm
                                Password
                            </label>
                            <input id="password_confirmation" type="text" name="password_confirmation"
                                   placeholder="confirm password"
                                   class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"/>
                        </div>
                        <div class="text-center mt-16 mb-16">
                            <button type="submit"
                                    class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">
                                Save
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </main>
    </div>
</x-app-layout>
