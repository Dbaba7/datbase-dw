<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Service Number:</strong> {{ $user->service_number }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>

                    <h4 class="font-semibold text-md mt-4">Roles</h4>
                    <ul>
                        @foreach ($user->roles as $role)
                            <li>{{ $role->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
