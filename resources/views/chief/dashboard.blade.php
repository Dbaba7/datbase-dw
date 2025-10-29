<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chief Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Total Crimes -->
                        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
                            <p class="font-bold">Total Crimes</p>
                            <p class="text-2xl">{{ $crimesCount }}</p>
                        </div>

                        <!-- Open Cases -->
                        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                            <p class="font-bold">Open Cases</p>
                            <p class="text-2xl">{{ $openCasesCount }}</p>
                        </div>

                        <!-- Total Officers -->
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                            <p class="font-bold">Total Officers</p>
                            <p class="text-2xl">{{ $officersCount }}</p>
                        </div>
                    </div>

                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mt-8">Recent Crimes</h3>

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
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Reported At
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($recentCrimes as $crime)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $crime->crime_type }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $crime->location }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $crime->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $crime->created_at->format('Y-m-d H:i') }}
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