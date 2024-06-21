<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">


                <h1>Location Details</h1>

                <h2>Clients</h2>
                <ul>
                    @foreach ($location->clients as $client)
                        <li>
                            {{ $client->name }}
                            <form
                                action="{{ route('locations.clients.detach', ['location' => $location->id, 'client' => $client->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <h2>Add Client</h2>
                <form action="{{ route('locations.clients.attach', $location->id) }}" method="POST">
                    @csrf
                    <label for="client_id">Select Client:</label>
                    <select name="client_id" id="client_id">
                        @foreach ($availableClients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Add</button>
                </form>
                @endsection

            </div>
        </main>
    </div>
    </div>
</x-app-layout>
