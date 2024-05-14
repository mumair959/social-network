<?php

namespace App\Http\Requests\Profile;

use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetUserFriendRequestsRequest extends FormRequest
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

        $friend_request_ids = FriendRequest::where([
            'origin' => 'Received',
            'status' => 'Pending',
            'user_id' => $user->id
            ])->pluck('friend_id')->toArray();

        $friend_requests = User::whereIn('id', $friend_request_ids)->with('userInfo')->get();
        
        return [
            'success' => true, 
            'friend_requests' => $friend_requests,
        ];

    }
}
