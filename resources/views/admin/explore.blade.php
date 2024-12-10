<x-app-layout>

    <table class="w-full border-collapse border border-gray-200 m-8">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">Hotel Name</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Image</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Address</th>
                <th class="border border-gray-300 px-4 py-2 text-left">City</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Room Type</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Delete</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data )
            <tr>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $data->hotel_name }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $data->description }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">
                    <img src="{{ asset('storage/'.$data->image) }}" class="w-24 h-24 object-cover">
                </td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $data->address }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $data->city }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $data->price }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">{{ $data->room_type }}</td>
                <td class="border border-gray-300 px-4 py-2 text-left">
                    <x-danger-button>
                        <a href="{{ route('hotel.delete',$data->id) }}" onclick="return confirm('Are you sure want to Delete this ? ')" >Delete</a>
                    </x-danger-button>
                </td>
                <td class="border border-gray-300 px-4 py-2 text-left">
                    <x-primary-button>
                        <a href="{{ route('admin.update',$data->id) }}"> Update </a>
                    </x-primary-button>
                </td>
            </tr>
            @endforeach
        </tbody>
     </table>

</x-app-layout>
