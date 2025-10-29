<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Officer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold">Assigned Crimes</h3>
                    <div class="mt-4">
                        @if ($crimes->count() > 0)
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Crime Type</th>
                                        <th class="px-4 py-2">Location</th>
                                        <th class="px-4 py-2">Status</th>
                                        <th class="px-4 py-2">Reported At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($crimes as $crime)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $crime->crime_type }}</td>
                                            <td class="border px-4 py-2">{{ $crime->location }}</td>
                                            <td class="border px-4 py-2">{{ $crime->status }}</td>
                                            <td class="border px-4 py-2">{{ $crime->reported_at }}</td>
                                            <td class="border px-4 py-2"><a href="{{ route('officer.crimes.show', $crime) }}" class="text-indigo-600 hover:text-indigo-900">View</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No crimes assigned.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
