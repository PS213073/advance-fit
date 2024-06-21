<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="text-right">
                    @can('Create muscle group')
                        <a href="{{ route('admin.muscleGroups.create') }}"
                            class="bg-[#221551] text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-[#6E38D5] transition-colors ">Add
                            Muscle Group</a>
                    </div>
                @endcan

                <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">
                                    Muscle Group Name</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-2/12">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('View muscle group')
                                @foreach ($musclesGroups as $musclesGroup)
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-4 px-6 border-b border-grey-light">{{ $musclesGroup->name }}</td>
                                        <td class="py-4 px-6 border-b border-grey-light text-right">

                                            @can('Edit muscle group')
                                                <a href="{{ route('admin.muscleGroups.edit', $musclesGroup->id) }}"
                                                    class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                                            @endcan

                                            @can('Delete muscle group')
                                                <form action="{{ route('admin.muscleGroups.destroy', $musclesGroup->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
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
