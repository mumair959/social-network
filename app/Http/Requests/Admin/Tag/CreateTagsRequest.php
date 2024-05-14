<?php

namespace App\Http\Requests\Admin\Tag;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateTagsRequest extends FormRequest
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
            'name' => 'required|string|max:100',
        ];
    }

    public function process($req){
        try {
            $tag = new Tag();

            $tag->name = $req['name'];
           
            $tag->save();

            return ['success' => true, 'msg' => 'Tag has been created successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
