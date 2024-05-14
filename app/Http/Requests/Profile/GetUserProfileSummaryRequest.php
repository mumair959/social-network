<?php

namespace App\Http\Requests\Profile;

use App\Models\User;
use App\Models\Post;
use App\Models\Following;
use App\Models\Follower;
use App\Models\PostImage;
use App\Models\UserInformation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class GetUserProfileSummaryRequest extends FormRequest
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
        $follower_ids = Follower::where('user_id', $user->id)
        ->pluck('follower_id')->toArray();

        $following_ids = Following::where('user_id', $user->id)
        ->pluck('following_id')->toArray();

        $post_ids = Post::where('created_by', $user->id)->pluck('id')->toArray();

        $summary['joined'] = $user->created_at->format('F Y');
        $summary['followers'] = User::whereIn('id', $follower_ids)->with('userInfo')->withCount('followers')->get();
        $summary['followings'] = User::whereIn('id', $following_ids)->with('userInfo')->withCount('followers')->get();
        
        $summary['photos'] = PostImage::whereIn('post_id', $post_ids)
        ->select('image_url')->skip(0)->take(9)->get();

        $basic_info = UserInformation::where('user_id', $user->id)
        ->with(['user', 'country', 'city'])->first();

        if (!empty($basic_info->date_of_birth)) {
            $basic_info->date_of_birth = $basic_info->date_of_birth->format('F Y');
            $basic_info->year_of_birth = $basic_info->date_of_birth->format('F Y');
        }

        $summary['basic_info'] = UserInformation::where('user_id', $user->id)
        ->with(['user', 'country', 'city'])->first();

        $summary['posts'] = Post::where('created_by', $user->id)
        ->with('postImages')->skip(0)->take(3)->get();

        return [
            'success' => true, 
            'summary' => $summary,
        ];

    }
}
