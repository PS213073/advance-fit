<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div
                class="flex flex-col justify-center items-center container mx-auto md:container md:mx-[0%] md:w-full px-6 py-8 bg-[#ffff] ">


                <h3 class="text-[#221551] text-3xl font-medium">Welcome {{ auth()->user()->first_name }} {{auth()->user()->last_name}}</h3>

                <p class="text-[#A6ADBB]">Roles : <b>
                        @foreach (auth()->user()->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </b> </p>

            </div>
        </main>
    </div>
    </div>
</x-app-layout>
