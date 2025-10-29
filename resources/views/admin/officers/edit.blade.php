<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Officer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.officers.update', $officer) }}">
                        @csrf
                        @method('PATCH')

                        <!-- User -->
                        <div>
                            <x-input-label for="user_id" :value="__('User')" />

                            <select id="user_id" name="user_id" class="block mt-1 w-full">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $officer->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Rank -->
                        <div class="mt-4">
                            <x-input-label for="rank" :value="__('Rank')" />

                            <x-text-input id="rank" class="block mt-1 w-full" type="text" name="rank" :value="old('rank', $officer->rank)" required autofocus />
                        </div>

                        <!-- Badge Number -->
                        <div class="mt-4">
                            <x-input-label for="badge_number" :value="__('Badge Number')" />

                            <x-text-input id="badge_number" class="block mt-1 w-full" type="text" name="badge_number" :value="old('badge_number', $officer->badge_number)" required />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('Phone Number')" />

                            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number', $officer->phone_number)" required />
                        </div>

                        <!-- Station -->
                        <div class="mt-4">
                            <x-input-label for="station" :value="__('Station')" />

                            <x-text-input id="station" class="block mt-1 w-full" type="text" name="station" :value="old('station', $officer->station)" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update Officer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
