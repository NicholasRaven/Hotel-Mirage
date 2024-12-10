<x-app-layout>
    <form action="{{ route('hotel.search') }}" method="GET" class="max-w-md mx-auto m-8">
        @csrf
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter city or address" value="{{ request()->search }}">
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    @if ($hotel->isEmpty())
    <p>No hotels found based on your search criteria.</p>
    @else

    <div class="flex justify-center items-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 p-6 m-8 bg-gray-50 ">
            @foreach ($hotel as $hotelItem)
            <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                <figure>
                    <img
                        src="{{ asset('storage/'.$hotelItem->image) }}"
                        alt="Hotel"
                        class="w-full h-48 object-cover" />
                </figure>
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $hotelItem->hotel_name }}</h2>
                    <p class="text-gray-600 text-sm">{{ $hotelItem->address }}, {{ $hotelItem->city }}</p>
                </div>
                <div class="px-4 pb-4">
                    <x-primary-button>
                        <a href="{{ route('hotel.booking',$hotelItem->id) }}"> See Details </a>
                    </x-primary-button>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    {{ $hotel->links() }}
</x-app-layout>
