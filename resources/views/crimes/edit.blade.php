<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Crime') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('crimes.update', $crime) }}">
                        @csrf
                        @method('PATCH')

                        <!-- Crime Type -->
                        <div>
                            <x-input-label for="crime_type" :value="__('Crime Type')" />

                            <x-text-input id="crime_type" class="block mt-1 w-full" type="text" name="crime_type" :value="old('crime_type', $crime->crime_type)" required autofocus />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />

                            <textarea id="description" name="description" class="block mt-1 w-full">{{ old('description', $crime->description) }}</textarea>
                        </div>

                        <!-- Location -->
                        <div class="mt-4">
                            <x-input-label for="location" :value="__('Location')" />

                            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location', $crime->location)" required />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />

                            <select id="status" name="status" class="block mt-1 w-full">
                                <option value="reported" {{ $crime->status == 'reported' ? 'selected' : '' }}>Reported</option>
                                <option value="under_investigation" {{ $crime->status == 'under_investigation' ? 'selected' : '' }}>Under Investigation</option>
                                <option value="resolved" {{ $crime->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="closed" {{ $crime->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update Crime') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
