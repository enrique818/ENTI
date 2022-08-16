<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender');
    }

    public function receiverUser()
    {
        return $this->belongsTo(User::class, 'receiver');
    }

    public function scopeConexiones($query, $user)
    {
        $me = auth()->user();
        return $query->where(function($query) use ($user) {
            $query->where('sender', $user->id)->orWhere('receiver', $user->id);
        })->where(function($query) use ($me) {
            $query->where('sender', $me->id)->orWhere('receiver', $me->id);
        });
    }
}
