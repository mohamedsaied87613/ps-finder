<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    // parent tables

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function playStation()
    {
        return $this->belongsTo(PlayStation::class, 'play_station_id');
    }
}
