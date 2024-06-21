<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.exercises.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="flex flex-col space-y-2">
                            <label for="excercise_name" class="text-gray-700 select-none font-medium">Exercise
                                Name</label>
                            <input id="excercise_name" type="text" name="name" value="{{ old('excercise_name') }}"
                                placeholder="Enter exercise name"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>
                   
                        <div class="flex flex-col space-y-2">
                            <label for="video_tutorial" class="text-gray-700 select-none font-medium">Video
                                Tutorial</label>
                            <input id="video_tutorial" type="text" name="video_tutorial"
                                value="{{ old('video_tutorial') }}" placeholder="Enter YouTube video URL"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
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
                        <div class="text-center mt-16">
                            <button type="submit"
                                class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
