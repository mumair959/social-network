<?php

namespace App\Http\Requests\Profile;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateUserPersonalInfoRequest extends FormRequest
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
            'id' => 'required|numeric',
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'username' => 'required|string|unique:users,username,'.request()->id,
            'introduction' => 'required|string|max:500',
            'gender' => 'required|in:Male,Female',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'date_of_birth' => 'required|date',
        ];
    }

    public function process($req){
        try {
            $user = User::find($req['id']);
            $user_info = UserInformation::where('user_id',$req['id'])->first();

            $user->first_name = $req['first_name'];
            $user->last_name = $req['last_name'];
            $user->username = $req['username'];

            $user_info->city_id = $req['city_id'];
            $user_info->country_id = $req['country_id'];
            $user_info->gender = $req['gender'];
            $user_info->date_of_birth = $req['date_of_birth'];
            $user_info->introduction = $req['introduction'];
           
            DB::transaction(function () use ($user,$user_info){
                $user->save();
                $user_info->save();
            });

            return ['success' => true, 'msg' => 'User personal info has been updated successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
