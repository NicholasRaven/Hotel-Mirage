<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BelongsTo;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_name',
        'description',
        'image',
        'address',
        'city',
        'price',
        'room_type',
    ];

    public function bookings()
    {
        return $this->belongsTo('App\Models\Booking', 'hotel_id', 'id');
    }

}
