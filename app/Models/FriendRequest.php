<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    protected $guarded = [];

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
