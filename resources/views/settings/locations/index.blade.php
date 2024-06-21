<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="text-right">
                    @can('Create role')
                        <a href="{{ route('admin.locations.create') }}"
                           class="bg-[#221551] text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-[#6E38D5] transition-colors ">Add
                            Location</a>
                </div>
                @endcan

                <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                        <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">
                                Name
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">
                                Address
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Post Code
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                City
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-2/12">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @can('View role')
                            @foreach ($locations as $location)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $location->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $location->address }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $location->postal_code }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $location->city }}</td>
                                    {{--                                    <td class="py-4 px-6 border-b border-grey-light">--}}
                                    {{--                                        @foreach ($location->clients as $client)--}}
                                    {{--                                            <span--}}
                                    {{--                                                class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $client->first_name }} {{ $client->last_name }}</span>--}}
                                    {{--                                        @endforeach--}}
                                    {{--                                    </td>--}}
                                    <td class="py-4 px-6 border-b border-grey-light text-right">

                                        @can('Edit location')
                                            <a href="{{ route('admin.locations.edit', $location->id) }}"
                                               class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                                        @endcan

                                        @can('Delete location')
                                            <form action="{{ route('admin.locations.destroy', $location->id) }}"
                                                  method="POST" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                        @endcan
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
    </div>
</x-app-layout>
