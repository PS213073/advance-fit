<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">


                <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                        <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">
                                Client Name
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Location
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($checkins as $checkin)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $checkin->frontuser->first_name }} {{ $checkin->frontuser->last_name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $checkin->location->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
</x-app-layout>
