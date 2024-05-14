<?php

namespace App\Http\Requests\Admin\Tag;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTagStatusRequest extends FormRequest
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
            $tag = Tag::where('id',$req['id'])->withoutGlobalScopes()->first();

            if (empty($tag)) {
                return ['error' => true, 'msg' => 'Tag not found'];
            }

            $tag->status = $req['status'];
           
            $tag->save();

            return ['success' => true, 'msg' => 'Tag status has been updated successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
