<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'destination_id',
        'source_id',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
