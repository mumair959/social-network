<?php

namespace App\Http\Requests\Admin\Page;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePageStatusRequest extends FormRequest
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
            'status' => 'required|in:Active,Blocked'
        ];
    }

    public function process($req){
        try {
            $group = Page::where('id',$req['id'])->withoutGlobalScopes()->first();

            if (empty($group)) {
                return ['error' => true, 'msg' => 'Page not found'];
            }

            $group->status = $req['status'];
           
            $group->save();

            return ['success' => true, 'msg' => 'Page status has been updated successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
