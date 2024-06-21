<x-front-guest-layout>
    <form method="POST" class="bg-white rounded-lg shadow-md p-4" action="{{ route('register') }}">
        @csrf

        <div class="p-4 px-5">
            <a href="/" class="flex items-center">
                <x-application-logo class="w-20 h-1 fill-current"/>
                <h1 class="text-4xl font-semibold">Advance Fit</h1>
            </a>
            <!-- First Name -->
            <div class="mt-4">
                <x-input-label for="first_name" :value="__('First Name')"/>
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                              :value="old('first_name')" required
                              autocomplete="first_name"/>
                <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-input-label for="last_name" :value="__('Last Name')"/>
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                              :value="old('last_name')" required
                              autocomplete="last_name"/>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('E-mail')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')"/>

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                              autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                              name="password_confirmation" required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <div class="flex flex-col space-y-2 mb-3">
                    <x-input-label for="date_of_birth" :value="__('Date of Birth')"/>
                    <x-text-input id="date_of_birth" name="date_of_birth" type="date"
                                  class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                  :value="old('date_of_birth')" :max="now()->subYears(16)->format('Y-m-d')" required
                                  autocomplete="bday"/>
                    <x-input-error :messages="$errors->get('date_of_birth')"/>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('login') }}">
                    {{ __('Already registerd?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-front-guest-layout>
