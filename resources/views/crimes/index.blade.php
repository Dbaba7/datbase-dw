<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reported Crimes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('crimes.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Report a New Crime
                    </a>

                    <form action="{{ route('crimes.index') }}" method="GET" class="mt-4">
                        <div class="flex">
                            <input type="text" name="search" placeholder="Search crimes..." class="form-control">
                            <button type="submit" class="btn-primary">Search</button>
                        </div>
                    </form>

                    <a href="{{ route('report.generate', ['search' => request()->search]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                        Generate Report
                    </a>

                    <table class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Crime Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Location
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Reported At
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($crimes as $crime)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $crime->crime_type }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $crime->location }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $crime->reported_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $crime->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('crimes.show', $crime->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
