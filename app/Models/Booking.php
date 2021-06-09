<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'user_id',
        'schedule_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
