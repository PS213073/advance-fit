<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Check-in History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Your Check-in History') }}
                    </h2>
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Location</th>
                            <th class="px-4 py-2">Check-in Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($checkins as $checkin)
                            <tr>
                                <td class="border px-4 py-2">{{ $checkin->location->name }}</td>
                                <td class="border px-4 py-2">{{ $checkin->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
