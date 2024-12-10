<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aboutus',[AboutUsController::class, 'index'])->name('aboutus');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Routes
Route::middleware(['auth','userMiddleware'])->group(function(){
    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');

    Route::get('booking_hotel/{id}',[HomeController::class,'booking_hotel'])->name('hotel.booking');
    Route::post('add_booking/{id}',[HomeController::class,'add_booking'])->name('user.booking');

    Route::get('booking_list',[HomeController::class,'booking_list'])->name('bookingList');
    Route::get('delete_booking/{id}',[HomeController::class,'delete_booking'])->name('user.delete');

    Route::get('explore',[HomeController::class,'search_hotel'])->name('hotel.search');

});

// Admin Routes
Route::middleware(['auth','adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    Route::get('/admin/create_hotel',[AdminController::class,'create_hotel'])->name('admin.create');
    Route::post('/admin/hotels',[AdminController::class,'store'])->name('hotel.store');

    Route::get('admin/view_hotel',[AdminController::class,'view_hotel'])->name('admin.explore');

    Route::get('/admin/delete_hotel/{id}',[AdminController::class,'delete_hotel'])->name('hotel.delete');
    Route::get('/admin/update_hotel/{id}',[AdminController::class,'update_hotel'])->name('admin.update');
    Route::post('/admin/edit_hotel/{id}',[AdminController::class,'edit_hotel'])->name('hotel.update');

    Route::get('/admin/detail_hotel/{id}',[HomeController::class,'detail_hotel'])->name('admin.hotel.detail');

});

require __DIR__.'/auth.php';
