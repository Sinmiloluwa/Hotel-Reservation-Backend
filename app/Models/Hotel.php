<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenant;
use Illuminate\Database\Eloquent\Scope;

class Hotel extends Model
{
    use HasFactory;
    
    public function attractions()
    {
        return $this->belongsToMany(Attraction::class, 'attraction_hotel','hotel_id','attraction_id');
    }

    public function scopeHotel($query)
    {
        return $query->where('created_by_user_id',auth()->id());
    }
}
