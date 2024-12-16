<x-app-layout>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-7xl mx-auto mt-8">
        <div class="flex flex-wrap items-center">
            <!-- Left Content -->
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold mb-4">Discover More About<br>Our Hotel Service</h2>
                <div class="h-1 w-20 bg-black mb-4 rounded-full"></div>
                <p class="text-gray-600 m-8 ">
                    At our hotel, we prioritize comfort, luxury, and convenience to provide an unforgettable stay for every guest. Whether you're here for business or leisure,
                    we offer a range of premium services designed to meet your every need. From spacious rooms with stunning views to exceptional dining experiences,
                    our dedicated staff ensures that you feel at home from the moment you arrive. Explore our diverse amenities, including a state-of-the-art fitness center, relaxing spa, and personalized concierge services, all tailored to make your stay with us truly remarkable.
                    Experience the perfect blend of elegance, relaxation, and hospitality—your next unforgettable getaway starts here.
                </p>
                <a href="{{ route('hotel.search') }}" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-6 rounded-full">
                    Discover More
                </a>
            </div>
            <!-- Right Content -->
            <div class="w-full md:w-1/2 mt-6 md:mt-0 flex justify-center">
                <img src="{{ asset('img/Hotel.jpg') }}" alt="Hotel Image" class="rounded-lg shadow-md">
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 p-6 m-8 bg-gray-50 ">
            @foreach ($hotel as $hotels)
            <div class="card bg-white rounded-lg shadow-md overflow-hidden">
                <figure>
                    <img
                        src="{{ asset('storage/'.$hotels->image) }}"
                        alt="Hotel"
                        class="w-full h-48 object-cover" />
                </figure>
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $hotels->hotel_name }}</h2>
                    <p class="text-gray-600 text-sm">{{ $hotels->address }}, {{ $hotels->city }}</p>
                </div>
                <div class="px-4 pb-4">
                    <x-primary-button>
                        <a href="{{ route('hotel.booking',$hotels->id) }}"> See Details </a>
                    </x-primary-button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{ $hotel->links() }}
</x-app-layout>
