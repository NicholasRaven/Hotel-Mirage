<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $hotel = Hotel::paginate(4);
        return view('admin.dashboard',compact('hotel'));
    }

    public function create_hotel(){
        return view('admin.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
            'address' => 'required|string',
            'city' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string',
        ]);

       $imagePath = $request->file('image')->store('hotels', 'public');

       $hotel = new Hotel();
       $hotel->hotel_name = $request->name;
       $hotel->description = $request->description;
       $hotel->image = $imagePath;
       $hotel->address = $request->address;
       $hotel->city = $request->city;
       $hotel->price = $request->price;
       $hotel->room_type = $request->type;
       $hotel->save();

       return redirect()->route('admin.dashboard')->with('success',true);
    }


    public function view_hotel(){

        $data = Hotel::all();

        return view('admin.explore',compact('data'));
    }

    public function delete_hotel($id){
        $data = Hotel::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }

    public function update_hotel($id){

        $data = Hotel::findOrFail($id);
        return view('admin.update',compact('data'));
    }

    public function edit_hotel(Request $request, $id){

        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        $imagePath = $request->file('image')->store('hotels', 'public');

       $hotel = new Hotel();
       $hotel->hotel_name = $request->name;
       $hotel->description = $request->description;
       $hotel->image = $imagePath;
       $hotel->address = $request->address;
       $hotel->city = $request->city;
       $hotel->price = $request->price;
       $hotel->room_type = $request->type;
       $hotel->save();

       return redirect()->route('admin.explore')->with('success','Hotel Update Successfully');
    }

    public function manage_booking(){
        $books = Booking::all();

        return view('admin.manage_booking',compact('books'));
    }

    public function approve_book($id){

        $books = Booking::findOrFail($id);
        $books->status = 'approved';
        $books->save();

        return redirect()->back();
    }

    public function reject_book($id){

        $books = Booking::findOrFail($id);
        $books->status = 'rejected';
        $books->save();

        return redirect()->back();
    }
}
