<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class,'attraction_hotel','attraction_id','hotel_id');
    }
}
