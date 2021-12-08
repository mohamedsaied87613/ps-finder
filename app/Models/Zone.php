<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    // child table
    
    public function playStations()
    {
        return $this->hasMany(PlayStation::class, 'zone_id');
    }
}
