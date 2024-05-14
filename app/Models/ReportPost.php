<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportPost extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function reportedBy()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}
