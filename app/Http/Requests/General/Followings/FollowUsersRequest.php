<?php

namespace App\Http\Requests\General\Followings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Follower;
use App\Models\Following;

class FollowUsersRequest extends FormRequest
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
            'following_id' => 'required|numeric|exists:users,id'
        ];
    }

    public function process($req){
        DB::transaction(function () use ($req) {
            Following::create([
                'user_id' => Auth::user()->id, 
                'following_id' => $req['following_id']
            ]);

            Follower::create([
                'user_id' => $req['following_id'], 
                'follower_id' => Auth::user()->id
            ]);
        });
        
        return [
            'success' => true, 
            'msg' => 'Following successfully'
        ];
    }
}
