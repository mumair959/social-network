<?php

namespace App\Http\Requests\Explore;

use App\Models\Comment;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Follower;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class GetUserDashboardDataRequest extends FormRequest
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
        $user = Auth::user();
        $followers = Follower::where('user_id', $user->id)->count();
        $posts = Post::where('created_by', $user->id)->count();
        $comments = Comment::count();

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
            'followers' => $followers, 
            'posts' => $posts, 
            'comments' => $comments,
            'today_viral' => empty($today_viral) ? 'N/A' : $today_viral->name,
            'this_week_viral' => empty($this_week_viral) ? 'N/A' : $this_week_viral->name,
            'all_time_viral' => empty($all_time_viral) ? 'N/A' : $all_time_viral->name,
        ];

    }
}
