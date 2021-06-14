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

    public function source()
    {
        return $this->belongsTo(Terminal::class, 'source_id');
    }

    public function destination()
    {
        return $this->belongsTo(Terminal::class, 'destination_id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }
}
