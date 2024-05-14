<?php

namespace App\Http\Requests\Profile;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateUserContactRequest extends FormRequest
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
            'contact_no' => 'required|numeric',
            'email' => 'required|email',
        ];
    }

    public function process($req){
        try {
            $user = User::find($req['id']);
            $user_info = UserInformation::where('user_id',$req['id'])->first();

            $user->email = $req['email'];

            $user_info->contact_no = $req['contact_no'];
           
            DB::transaction(function () use ($user,$user_info){
                $user->save();
                $user_info->save();
            });

            return ['success' => true, 'msg' => 'User contact info has been updated successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
