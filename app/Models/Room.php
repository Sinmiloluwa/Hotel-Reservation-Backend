<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne(User::class,'user_id')->where('user_id',auth()->id());
        
    }

    public function save(array $options = [])
    {
        if (!$this->user_id && auth()->user()) {
            $this->user_id = auth()->user()->getKey();
        }

        return parent::save();
    }

    public function scopeUser($query)
    {
        return $query->where('user_id',auth()->id());
    }
}
