<?php

namespace App\Http\Requests\Profile;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetUserInfoRequest extends FormRequest
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
        $user_info = User::where("users.id", Auth::user()->id)
        ->select('users.id', 'users.first_name', 'users.last_name', 'users.username', 'users.email',
        'user_informations.gender', 'user_informations.date_of_birth', 'user_informations.city_id',
        'user_informations.country_id', 'user_informations.contact_no')
        ->join("user_informations","user_informations.user_id","=","users.id")
        ->first();

        $user_info->profile_image = $user_info->userInfo->profile_image;

        return [
            'success' => true, 
            'user_info' => $user_info,
        ];

    }
}
