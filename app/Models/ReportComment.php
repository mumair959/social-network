<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportComment extends Model
{
    protected $guarded = [];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function reportedBy()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}
