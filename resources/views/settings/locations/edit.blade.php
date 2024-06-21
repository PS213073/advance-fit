<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.locations.update', $location->id) }}">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="name" class="text-gray-700 select-none font-medium">Address</label>
                            <input id="name" type="text" name="name"
                                value="{{ old('name', $location->name) }}" placeholder="Address"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 mb-3" />
                        </div>
                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="address" class="text-gray-700 select-none font-medium">Address</label>
                            <input id="address" type="text" name="address"
                                value="{{ old('address', $location->address) }}" placeholder="Address"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 mb-3" />
                        </div>
                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="postcode" class="text-gray-700 select-none font-medium">Postcode</label>
                            <input id="postcode" type="text" name="postal_code"
                                value="{{ old('postcode', $location->postal_code) }}" placeholder="Postcode"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 mb-3" />
                        </div>
                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="city" class="text-gray-700 select-none font-medium">City</label>
                            <input id="city" type="text" name="city"
                                value="{{ old('city', $location->city) }}" placeholder="City"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 mb-3" />
                        </div>

                        <div class="text-center mt-16 mb-16">
                            <button type="submit"
                                class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Save</button>
                        </div>
                    </form>
                </div>


            </div>
        </main>
    </div>
</x-app-layout>
