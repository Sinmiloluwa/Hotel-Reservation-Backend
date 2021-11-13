<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $table = 'room_type';

    public function scopeRoomType($query)
    {
        return $query->where('created_by_user_id',auth()->id());
    }
}
