<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Check-In!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Check-in here!') }}
                    </h2>
                    <form action="{{ route('front.checkin.store') }}" method="POST">
                        @csrf
                        <div class="flex items-center space-x-10">
                            <div class="mt-5">
                                <x-input-label for="name" class="text-xl" :value="__('Locations')"/>
                                <select name="location_id" id="location"
                                        class=" mt-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-primary-button class="bg-green-700 mt-12">{{ __('Checkin') }}</x-primary-button>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success text-green-500">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-500">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-front-layout>
