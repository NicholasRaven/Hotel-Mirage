<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
    ];

    public function hotel(){
        return $this->hasOne('App\Models\Hotel','id','hotel_id');
    }
}
