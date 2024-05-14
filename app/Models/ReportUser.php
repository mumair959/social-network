<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reportedBy()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}
