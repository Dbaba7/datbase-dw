<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                        </div>

                        <!-- Service Number -->
                        <div class="mt-4">
                            <x-input-label for="service_number" :value="__('Service Number')" />
                            <x-text-input id="service_number" class="block mt-1 w-full" type="text" name="service_number" :value="$user->service_number" required />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update User') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <div class="mt-4">
                        <h4 class="font-semibold text-md">Roles</h4>
                        <ul>
                            @foreach ($user->roles as $role)
                                <li>{{ $role->name }}</li>
                            @endforeach
                        </ul>

                        <form action="{{ route('admin.users.roles.store', $user->id) }}" method="POST" class="mt-2">
                            @csrf
                            <select name="role_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <x-primary-button class="mt-2">
                                {{ __('Assign Role') }}
                            </x-primary-button>
                        </form>
                    </div>
                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <x-danger-button class="ms-4" onclick="return confirm('Are you sure you want to delete this user?')">
                            {{ __('Delete User') }}
                        </x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
