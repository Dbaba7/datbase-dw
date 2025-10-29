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
                    <h3 class="font-semibold text-lg">{{ $crime->crime_type }}</h3>
                    <p class="text-gray-600">{{ $crime->description }}</p>
                    <p class="text-gray-600"><strong>Location:</strong> {{ $crime->location }}</p>
                    <p class="text-gray-600"><strong>Reported At:</strong> {{ $crime->reported_at }}</p>
                    <p class="text-gray-600"><strong>Status:</strong> {{ $crime->status }}</p>

                    <div class="mt-4">
                        <h4 class="font-semibold text-md">Update Case Status</h4>
                        <form action="{{ route('crimes.update', $crime->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="reported" {{ $crime->status == 'reported' ? 'selected' : '' }}>Reported</option>
                                <option value="under_investigation" {{ $crime->status == 'under_investigation' ? 'selected' : '' }}>Under Investigation</option>
                                <option value="resolved" {{ $crime->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="closed" {{ $crime->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                            <x-primary-button class="mt-2">
                                {{ __('Update Status') }}
                            </x-primary-button>
                        </form>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-semibold text-md">Assigned Officers</h4>
                        <ul>
                            @foreach ($crime->officers as $officer)
                                <li>{{ $officer->name }} ({{ $officer->badge_number }})</li>
                            @endforeach
                        </ul>

                        <form action="{{ route('crimes.cases.store', $crime->id) }}" method="POST" class="mt-2">
                            @csrf
                            <select name="officer_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($officers as $officer)
                                    <option value="{{ $officer->id }}">{{ $officer->name }} ({{ $officer->badge_number }})</option>
                                @endforeach
                            </select>
                            <x-primary-button class="mt-2">
                                {{ __('Assign Officer') }}
                            </x-primary-button>
                        </form>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-semibold text-md">Case Evidence</h4>
                        <ul>
                            @foreach ($crime->evidence as $evidence_item)
                                <li>{{ $evidence_item->description }} (<a href="{{ Storage::url($evidence_item->file_path) }}" target="_blank">View</a>)</li>
                            @endforeach
                        </ul>

                        <form action="{{ route('crimes.evidence.store', $crime->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                            @csrf
                            <div>
                                <x-input-label for="description" :value="__('Evidence Description')" />
                                <textarea id="description" name="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description') }}</textarea>
                            </div>
                            <div class="mt-2">
                                <x-input-label for="file" :value="__('Evidence File')" />
                                <input type="file" name="file" id="file" class="block mt-1 w-full">
                            </div>
                            <x-primary-button class="mt-2">
                                {{ __('Add Evidence') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
