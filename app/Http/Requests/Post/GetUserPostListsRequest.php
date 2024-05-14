<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\PostLike;

class GetUserPostListsRequest extends FormRequest
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
        $posts = Post::with(['createdBy', 'createdBy.userInfo', 'comments',
        'comments.commentedBy.userInfo','postImages', 'postLikes' => function($q) {
            $q->where('user_id', Auth::user()->id);
        }])
        ->withCount('comments')->orderBy('id', 'DESC')->get();

        foreach ($posts as $post) {
            $post->posted_at = $post->created_at->diffForHumans();
            $post->likes_count = PostLike::where([
                'post_id' => $post->id,
                'action' => 'Like'
                ])->count();
        }
        
        return [
            'success' => true, 
            'posts' => $posts
        ];
    }
}
