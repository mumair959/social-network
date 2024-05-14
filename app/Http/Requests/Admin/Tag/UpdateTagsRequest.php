<?php

namespace App\Http\Requests\Admin\Tag;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTagsRequest extends FormRequest
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
            'question' => 'required|string|max:500',
            'answer' => 'required|string|max:2000',
        ];
    }

    public function process($req){
        try {
            $tag = Tag::find($req['id']);

            if (empty($tag)) {
                return ['error' => true, 'msg' => 'Tag not found'];
            }

            $tag->question = $req['question'];
            $tag->answer = $req['answer'];
           
            $tag->save();

            return ['success' => true, 'msg' => 'Tag has been updated successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
