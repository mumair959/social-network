<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'user_type_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userInfo()
    {
        return $this->hasOne(UserInformation::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followings', 'following_id');
    }

    public function friendRequests()
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'friend_id');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friend_user', 'friend_id');
    }

    public function isAdmin()
    {
        return $this->user_type_id == 1 ? true : false;
    }

    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope);
    }
}
