<?php

namespace App\Http\Requests\Profile;

use App\Models\Follower;
use App\Models\Following;
use App\Models\Post;
use App\Models\UserInformation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetUserProfileDataRequest extends FormRequest
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
        $posts = Post::where('created_by', Auth::user()->id)->count();
        $followings = Following::where('user_id', Auth::user()->id)->count();
        $followers = Follower::where('user_id', Auth::user()->id)->count();
        
        $profile['user'] = Auth::user();
        $profile['user_info'] = UserInformation::where('user_id', Auth::user()->id)->first();
        $profile['stats'] = ['posts' => $posts, 'followings'=> $followings, 'followers'=> $followers];

        return [
            'success' => true, 
            'profile' => $profile,
        ];

    }
}
