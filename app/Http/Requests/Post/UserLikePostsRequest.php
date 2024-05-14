<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\PostLike;

class UserLikePostsRequest extends FormRequest
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
            'post_id' => 'required|numeric',
        ];
    }

    public function process($req){
        try {
            $post_like = PostLike::where('user_id', Auth::user()->id)
            ->where('post_id', $req['post_id'])->first();

            if (!empty($post_like)) {
                $post_like->delete();
                return ['success' => true, 'msg' => 'Post has not been liked'];
            }
            else{
                $post_like = new PostLike();

                $post_like->post_id = $req['post_id'];
                $post_like->user_id = Auth::user()->id;
                $post_like->action = 'Like';

                $post_like->save();

                return ['success' => true, 'msg' => 'Post has been liked'];
            }

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
