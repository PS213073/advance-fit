<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="text-right">
                    @can('Create role')
                        <a href="{{ route('admin.exercises.create') }}"
                            class="bg-[#221551] text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-[#6E38D5] transition-colors">Add
                            exercise</a>
                    @endcan
                </div>

                <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">
                                    Name
                                </th>
                          
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                    Video
                                </th>

                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                    Muscle Groups
                                </th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-2/12">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('View role')
                                @foreach ($exercises as $exercise)
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-4 px-6 border-b border-grey-light">{{ $exercise->name }}</td>
                                    
                                        <td class="py-4 px-6 border-b border-grey-light">
                                            @if ($exercise->video_tutorial)
                                                <a href="{{ $exercise->video_tutorial }}" target="_blank" class="text-blue-500 hover:underline">Watch Video</a>
                                            @else
                                                No Video
                                            @endif
                                        </td>

                                        <td class="py-4 px-6 border-b border-grey-light">
                                            @foreach ($exercise->muscleGroups as $muscleGroup)
                                                <span class="text-gray-800 rounded-full px-2 py-1">{{ $muscleGroup->name }}</span>
                                            @endforeach
                                        </td>

                                        <td class="py-4 px-6 border-b border-grey-light text-right">
                                            @can('Edit exercise')
                                                <a href="{{ route('admin.exercises.edit', $exercise->id) }}"
                                                    class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                                            @endcan

                                            @can('Delete exercise')
                                                <form action="{{ route('admin.exercises.destroy', $exercise->id) }}"
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
</x-app-layout>
