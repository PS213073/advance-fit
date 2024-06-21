<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.exercises.update', $exercise->id) }}">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="name" class="text-gray-700 select-none font-medium">Name</label>
                            <input id="name" type="text" name="name"
                                value="{{ old('name', $exercise->name) }}" placeholder="Name"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 mb-3" />
                        </div>
                        
                        <div class="flex flex-col space-y-2 mb-3">
                            <label for="video" class="text-gray-700 select-none font-medium">Video Url</label>
                            <input id="video" type="text" name="video"
                                value="{{ old('video', $exercise->video_tutorial) }}" placeholder="URL"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 mb-3" />
                        </div>
                        <h3 class="text-xl my-4 text-gray-600">Muscle Groups</h3>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach ($muscleGroups as $muscleGroup)
                                <div class="flex flex-col justify-cente">
                                    <div class="flex flex-col">
                                        <label class="inline-flex items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                                                name="muscleGroups[]" value="{{ $muscleGroup->id }}"><span
                                                class="ml-2 text-gray-700">{{ $muscleGroup->name }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
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
