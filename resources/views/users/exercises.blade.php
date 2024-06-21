@include('front.layouts.header')

<section class="py-24 px-10">
    <h2 class="font-medium text-3xl text-center pb-8">Exercises</h2>
    <div class="flex items-center justify-around">
        <div class="w-fit grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-8">
            @foreach ($exercises as $exercise)
                <div class="rounded overflow-hidden shadow-lg p-6">
                    <img src="{{ asset('assets/images/exercise_card.png') }}" alt="Exercise Card">
                    <div class="font-bold text-xl mb-2 mt-2">{{ $exercise->name }}</div>
                    <div class="mt-2">
                        @foreach ($exercise->muscleGroups as $muscleGroup)
                            <span
                                class="inline-block bg-blue-200 text-blue-800 px-2 py-1 rounded-full font-semibold tracking-wide text-xs">{{ $muscleGroup->name }}</span>
                        @endforeach
                    </div>
                    <p class="mt-2">
                        <a href="{{ $exercise->video_tutorial }}" target="_blank" class="text-blue-500">Watch
                            Tutorial</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('front.layouts.footer')
