<x-app-layout>
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center min-h-[10vh] bg-gray-100">
                <h1 class="text-4xl font-bold text-gray-800">Detailed Hotel Information </h1>
            </div>
            <div class="container mx-auto px-4 py-8">
                <div class="border border-gray-300 rounded-lg shadow-md bg-white p-6">
                    <div class="flex flex-col md:flex-row items-start">
                        <div class="md:w-1/2 mb-8 md:mb-0">
                            <img src="{{ asset('storage/'.$hotel->image) }}" alt="Hotel" class="w-full h-80 object-cover rounded-lg shadow-lg">
                        </div>
                        <div class="md:w-1/2 md:pl-8">
                            <h2 class="text-3xl font-bold mb-4">{{ $hotel->hotel_name }}</h2>
                            <p class="text-gray-700 leading-relaxed m-4">
                                {{ $hotel->description }}</p>
                            <p class="text-gray-700 leading-relaxed m-4">
                                {{ $hotel->address }}, {{ $hotel->city }}</p>
                            <h2 class="text-gray-700 leading-relaxed m-4">
                                <b>{{ $hotel->room_type }}</b>: {{ $hotel->price }}$ </h2>
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <a href="{{ route('admin.update',$hotel->id) }}">  Update Hotel </a>
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
