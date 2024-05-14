<?php

namespace App\Http\Requests\General\Followings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Following;
use App\Models\User;

class GetFollowingsRecommendationRequest extends FormRequest
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

    public function process($req){
        $records_count = 6;
        $take = isset($req['take']) ? $req['take'] : 0;
        $take = $records_count + $take;

        $already_following = Following::where('user_id', Auth::user()->id)
        ->pluck('following_id')->toArray();

        $followings = User::with('userInfo')
        ->where('id', '<>', Auth::user()->id)
        ->whereNotIn('id', $already_following)
        ->skip(0)->take($take)->get();

        $total_followings = User::where('id', '<>', Auth::user()->id)->count();
        
        return [
            'success' => true, 
            'total_followings' => $total_followings,
            'followings' => $followings
        ];
    }
}
