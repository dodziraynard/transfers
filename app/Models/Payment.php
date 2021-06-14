<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'amount',
        'number',
        'note',
        'user_id',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
