<?php

namespace App\Http\Requests\Profile;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateUserSocialUrlRequest extends FormRequest
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
            'facebook' => 'sometimes|required|url',
            'twitter' => 'sometimes|required|url',
            'instagram' => 'sometimes|required|url',
            'youtube' => 'sometimes|required|url',
            'linkedin' => 'sometimes|required|url'
        ];
    }

    public function process($req){
        try {
            $user_info = UserInformation::where('user_id',$req['id'])->first();

            $data = Arr::only($req, ['facebook', 'twitter', 'instagram', 'youtube', 'linkedin']);

            $user_info->update($data);

            return ['success' => true, 'msg' => 'User social urls has been updated successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
