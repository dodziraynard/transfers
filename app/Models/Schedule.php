<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'departure_time',
        'arrival_time',
        'price',
        'bus_id',
        'destination_id',
        'source_id',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
