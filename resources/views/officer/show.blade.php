<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crime Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold">{{ $crime->crime_type }}</h3>
                    <p class="mt-2"><strong>Location:</strong> {{ $crime->location }}</p>
                    <p><strong>Status:</strong> {{ $crime->status }}</p>
                    <p><strong>Reported At:</strong> {{ $crime->reported_at }}</p>
                    <p><strong>Description:</strong> {{ $crime->description }}</p>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-lg font-semibold">Suspects</h3>
                <a href="{{ route('crimes.suspects.create', $crime) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Suspect
                </a>
                <div class="mt-4">
                    @foreach ($crime->suspects as $suspect)
                        <div class="flex items-center justify-between mt-2">
                            <p>{{ $suspect->name }}</p>
                            <div>
                                <a href="{{ route('suspects.edit', $suspect) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('suspects.destroy', $suspect) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-lg font-semibold">Victims</h3>
                <a href="{{ route('crimes.victims.create', $crime) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Victim
                </a>
                <div class="mt-4">
                    @foreach ($crime->victims as $victim)
                        <div class="flex items-center justify-between mt-2">
                            <p>{{ $victim->name }}</p>
                            <div>
                                <a href="{{ route('victims.edit', $victim) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('victims.destroy', $victim) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-lg font-semibold">Evidence</h3>
                <a href="{{ route('crimes.evidence.create', $crime) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Evidence
                </a>
                <div class="mt-4">
                    @foreach ($crime->evidence as $evidence_item)
                        <div class="flex items-center justify-between mt-2">
                            <p>{{ $evidence_item->description }}</p>
                            <div>
                                <a href="{{ asset('storage/' . $evidence_item->file_path) }}" target="_blank" class="text-blue-600 hover:text-blue-900">View</a>
                                <a href="{{ route('evidence.edit', $evidence_item) }}" class="text-indigo-600 hover:text-indigo-900 ml-4">Edit</a>
                                <form action="{{ route('evidence.destroy', $evidence_item) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
