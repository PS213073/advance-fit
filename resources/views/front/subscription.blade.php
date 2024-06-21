<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Subscription') }}
                    </h2>
                    <form action="{{ route('front.subscription.addSubscription') }}" method="POST">
                        @csrf
                        <div class="flex items-start space-x-10">
                            <div class="mt-5">
                                <x-input-label for="subscription" :value="__('Subscriptions')"/>
                                <select id="subscription" name="subscription_id" class="block mt-1 w-full rounded-lg">
                                    @foreach($subscriptions as $subscription)
                                        <option value="{{ $subscription->id }}">{{ $subscription->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-primary-button class="bg-green-700 mt-12">{{ __('Subscribe') }}</x-primary-button>
                            </div>
                        </div>
                    </form>

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

                </div>
            </div>
        </div>
    </div>
</x-front-layout>
