<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function userOne()
    {
        return $this->belongsTo(User::class, 'user_one_id');
    }

    public function userTwo()
    {
        return $this->belongsTo(User::class, 'user_two_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getOtroAttribute()
    {
        $me = auth()->user();
        if ($me->id == $this->user_one_id) {
            return $this->userTwo;
        } else {
            return $this->userOne;
        }
    }

    public function scopeChatWithUser($query, $user)
    {
        $me = auth()->user();
        return $query->where(function($query) use ($user) {
            $query->where('user_one_id', $user->id)->orWhere('user_two_id', $user->id);
        })->where(function($query) use ($me) {
            $query->where('user_one_id', $me->id)->orWhere('user_two_id', $me->id);
        });
    }
}
