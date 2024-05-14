<?php

namespace App\Models;

use App\Models\Scopes\ApproveScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function rejectedBy()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function postLikes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }

    public function postVideos()
    {
        return $this->hasMany(PostVideo::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new ApproveScope);
    }
}
