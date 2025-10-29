<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report a Crime') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('dispatcher.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="crime_type" class="block font-medium text-sm text-gray-700">Crime Type</label>
                            <input type="text" name="crime_type" id="crime_type" class="block mt-1 w-full" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <textarea name="description" id="description" class="block mt-1 w-full" required></textarea>
                        </div>

                        <div class="mt-4">
                            <label for="location" class="block font-medium text-sm text-gray-700">Location</label>
                            <input type="text" name="location" id="location" class="block mt-1 w-full" required />
                        </div>

                        <div class="mt-4">
                            <label for="officer_id" class="block font-medium text-sm text-gray-700">Assign Officer</label>
                            <select name="officer_id" id="officer_id" class="block mt-1 w-full">
                                @foreach ($officers as $officer)
                                    <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="ml-4">
                                {{ __('Report Crime') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
