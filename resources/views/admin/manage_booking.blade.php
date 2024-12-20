<x-app-layout>
    <table class="w-full border-collapse border border-gray-200 m-8">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">Booking Id</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Customer Name</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Hotel Name</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Image</th>
                <th class="border border-gray-300 px-4 py-2 text-left">City, Address</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Room Type</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Check In Date</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Check Out Date</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Cancel Booking</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book )
            <tr>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $book->id }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $book->name }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $book->hotel->hotel_name }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">
                    <img src="{{ asset('storage/'.$book->hotel->image) }}" class="w-24 h-24 object-cover">
                </td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $book->hotel->city }}, {{ $book->hotel->address }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $book->hotel->price }}$ </td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $book->hotel->room_type }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $book->status }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $book->Start_date }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $book->End_date }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">
                    <x-primary-button>
                        <a href="{{ route('user.delete',$book->id) }}"> Terminate Order </a> </x-primary-button>
                </td>
                <td>
                    <x-primary-button class="bg-green-500 hover:bg-green-600 text-white border border-green-700 ml-4">
                        <a href="{{ route('approve.book',$book->id) }}"> Approve </a> </x-primary-button>
                    <x-primary-button class="bg-red-500 hover:bg-red-600 text-white border border-red-700 m-4 ">
                        <a href="{{ route('reject.book',$book->id) }}"> Rejected </a> </x-primary-button>
                </td>
            </tr>
            @endforeach
        </tbody>
     </table>

</x-app-layout>
