<?php

namespace App\Http\Requests\Profile;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswordRequest extends FormRequest
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
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function process($req){
        try {
            $user = User::find($req['id']);
            
            if (!Hash::check($req['current_password'], $user->password)) {
                return ['error' => true, 'title' => 'Opps!', 'type' => 'error', 'msg' => 'Wrong current password entered'];
            }

            $user->password = Hash::make($req['password']);

            $user->save();

            return ['success' => true, 'title' => 'Great!', 'type' => 'success', 'msg' => 'User password has been updated successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
