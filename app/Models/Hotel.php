<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public function attractions()
    {
        return $this->hasMany(Attraction::class, 'attraction_hotel','hotel_id','attraction_id');
    }
}
