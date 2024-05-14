<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Profanity\Facades\Profanity;
use App\Models\Post;
use App\Models\Tag;

class UserSubmitPostsRequest extends FormRequest
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
            'description' => 'required|string|max:2000',
        ];
    }

    public function process($req){
        try {
            DB::transaction(function () use ($req) {
                $tag_ids = $this->getHashTags($req['description']);
    
                $post = new Post();

                $clean_description = Profanity::blocker($req['description'])->filter();
    
                $post->description = $clean_description;
                $post->created_by = Auth::user()->id;
               
                $post->save();
                
                if (count($tag_ids) > 0) {
                    $post->tags()->sync($tag_ids);
                }
            });

            return ['success' => true, 'msg' => 'Post has been created successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }

    private function getHashTags($description) {
        $tokenize = explode(' ', $description);
        $tokenize_tags = [];
        $token_names = [];

        foreach ($tokenize as $token) {
            $token = trim($token);
            if (str_starts_with($token, '#')) {
                $token_names[] = $token;
                $tokenize_tags[] = ['name' => $token];
            }
        }
    
        Tag::upsert($tokenize_tags, ['id'], ['name']);

        $token_ids = Tag::whereIn('name', $token_names)->pluck('id')->toArray();
        
        return $token_ids;
    }
}
