<?php

namespace App\Http\Requests\Admin\Dashboard;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostVideo;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class GetDashboardWidgetDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function process(){
        $all_users = User::count();
        $active_users = User::where('status', 'Active')->count();
        $blocked_users = User::where('status', 'Blocked')->count();
        $posts = Post::count();
        $photos = PostImage::count();
        $videos = PostVideo::count();
        $comments = Comment::count();
        $total_hashtags = Tag::count();
        $likes = 0;
        
        $all_time_viral = Tag::withCount('posts')
        ->orderBy('posts_count', 'desc')->having('posts_count', '>', 0)->first();

        $this_week_viral = Tag::withCount(['posts' => function($query){
            return $query->whereBetween('created_at', 
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            ); 
        }])
        ->orderBy('posts_count', 'desc')->having('posts_count', '>', 0)->first();

        $today_viral = Tag::withCount(['posts' => function($query){
            return $query->whereDate('created_at', Carbon::today()); 
        }])
        ->orderBy('posts_count', 'desc')->having('posts_count', '>', 0)->first();

        return [
            'success' => true, 
            'all_users' => $all_users, 
            'active_users' => $active_users, 
            'blocked_users' => $blocked_users, 
            'posts' => $posts, 
            'comments' => $comments, 
            'likes' => $likes,
            'photos' => $photos,
            'videos' => $videos,
            'total_hashtags' => $total_hashtags,
            'today_viral' => empty($today_viral) ? 'N/A' : $today_viral->name,
            'this_week_viral' => empty($this_week_viral) ? 'N/A' : $this_week_viral->name,
            'all_time_viral' => empty($all_time_viral) ? 'N/A' : $all_time_viral->name,
        ];

    }
}
