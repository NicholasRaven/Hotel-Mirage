<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $hotel = Hotel::all();

        return view('user.dashboard',compact('hotel'));
    }
}

