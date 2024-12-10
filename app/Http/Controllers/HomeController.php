<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Booking;

class HomeController extends Controller
{
    public function detail_hotel($id){
        $hotel = Hotel::findOrFail($id);

        return view('admin.detail_hotel',compact('hotel'));
    }

    public function booking_hotel($id){
        $hotel = Hotel::findOrFail($id);

        return view('user.booking_hotel',compact('hotel'));
    }

    public function add_booking(Request $request, $id){

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'date|after:start_date',
        ]);

        $hotel = new Booking;
        $hotel->hotel_id = $id;
        $hotel->name = $request->name;
        $hotel->email = $request->email;
        $hotel->phone = $request->phone;
        $hotel->Start_date = $request->start_date;
        $hotel->End_date = $request->end_date;

        $hotel->save();

        return redirect()->back()->with('message','Room Booked Successfully :)');
    }

    public function booking_list(){
        $books = Booking::all();

        return view('user.bookingList',compact('books'));
    }

    public function delete_booking($id){
        $book = Booking::findOrFail($id);
        $book->delete();

        return redirect()->back();
    }

    public function search_hotel(Request $request){
    $hotel = Hotel::query();

    $searchTerm = $request->input('search');

    if ($searchTerm && $searchTerm != '') {
        $hotel->where(function ($query) use ($searchTerm) {
            $query->where('city', 'like', '%' . $searchTerm . '%')
                  ->orWhere('address', 'like', '%' . $searchTerm . '%');
        });
    }

    $hotel = $hotel->paginate(4);

        return view('user.explore',['hotel' => $hotel]);
    }
}
