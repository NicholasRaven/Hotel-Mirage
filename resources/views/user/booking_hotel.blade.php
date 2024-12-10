<x-app-layout>
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center min-h-[10vh] bg-gray-100">
                <h1 class="text-4xl font-bold text-gray-800">Detailed Hotel Information </h1>
            </div>
            @if (session()->has('message'))
            <div class="p-4 mb-4 text-center text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">

                {{ session()->get('message') }}

                </span>
              </div>
            @endif
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto px-4 py-8">
                <div class="border border-gray-300 rounded-lg shadow-md bg-white p-6">
                    <h1 class="text-2xl font-bold text-center mb-6">Hotel Booking Form</h1>
                    <div class="flex items-center justify-center bg-gray-200">
                        <form action="{{ route('user.booking',$hotel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                        <div class="grid gap-6 mt-6 md:grid-cols-2">

                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name: </label>
                                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                            </div>

                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email: </label>
                                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Email" required />
                            </div>

                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone: </label>
                                <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Phone" required />
                            </div>

                            <div>
                                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date: </label>
                                <input type="date" id="start_date" name="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            </div>


                            <div>
                                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date: </label>
                                <input type="date" id="end_date" name="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            </div>


                            <div class="mt-6">
                                <button type="submit" class="bg-teal-800 text-white py-2 px-6 rounded-lg hover:bg-teal-900 w-full">
                                    Submit
                                </button>
                            </div>


                            <div class="mt-4">
                                <a href="{{ route('dashboard') }}" class="bg-gray-800 text-white py-2 px-6 rounded-lg hover:bg-gray-900 w-full text-center block">
                                    Back
                                </a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
