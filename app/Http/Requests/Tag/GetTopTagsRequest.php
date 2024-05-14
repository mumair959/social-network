<?php

namespace App\Http\Requests\Tag;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetTopTagsRequest extends FormRequest
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

    public function process($req){
        $records_count = 6;
        $take = isset($req['take']) ? $req['take'] : 0;
        $take = $records_count + $take;

        $tags = Tag::withCount('posts')->skip(0)->take($take)
        ->orderBy('posts_count', 'DESC')->get();

        $total_tags = Tag::count();
        
        return [
            'success' => true, 
            'total_tags' => $total_tags,
            'tags' => $tags,
        ];

    }
}
