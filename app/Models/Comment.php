<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function commentedBy()
    {
        return $this->belongsTo(User::class, 'commented_by');
    }

    public function replyTo()
    {
        return $this->belongsTo(Comment::class, 'reply_to');
    }
}
