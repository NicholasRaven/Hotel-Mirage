<x-app-layout>
    <div class="flex justify-center m-12">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-lg">
            <h1 class="text-2xl font-bold text-center mb-6">Form Update Hotel</h1>
            <form action="{{ route('hotel.update',$data->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700">Hotel Name:</label>
                    <input type="text" id="name" name="name" value="{{ $data->hotel_name }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label for="description" class="block text-gray-700">Hotel Description:</label>
                    <input type="text" id="description" name="description" value="{{ $data->description }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <lable> Current Image </lable>
                    <img width="100" src="{{ asset('storage/'.$data->image) }}">
                </div>
                <div>
                    <label for="image" class="block text-gray-700">Hotel Picture <span class="text-sm text-gray-500">*Jpg/Jpeg:</span></label>
                    <input type="file" id="image" name="image" class="w-full border rounded-lg p-2" accept=".jpg,.jpeg" required>
                </div>
                <div>
                    <label for="address" class="block text-gray-700">Hotel Address:</label>
                    <input type="text" id="address" name="address" value="{{ $data->address }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label for="city" class="block text-gray-700">Hotel City:</label>
                    <input type="text" id="city" name="city" value="{{ $data->city }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label for="price" class="block text-gray-700">Hotel Price:</label>
                    <input type="number" id="price" name="price" value="{{ $data->price }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label for="room_type" class="block text-gray-700">Room Type:</label>
                    <select name="type">
                        <option selected value="{{ $data->room_type }}">{{ $data->room_type }}</option>

                        <option value="regular">Regular</option>
                        <option value="deluxe">Deluxe</option>
                        <option value="suite">Suite</option>
                    </select>
                </div>
                <div class="flex justify-between mt-6">
                    <button type="submit" class="bg-teal-800 text-white py-2 px-6 rounded-lg hover:bg-teal-900">Update Hotel</button>
                    <a href="{{ route('admin.explore') }}" class="bg-teal-800 text-white py-2 px-6 rounded-lg hover:bg-teal-900 text-center">Back</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
