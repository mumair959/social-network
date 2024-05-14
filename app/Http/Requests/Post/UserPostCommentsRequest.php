<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class UserPostCommentsRequest extends FormRequest
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
            'comment' => 'required|string|max:500',
            'post_id' => 'required|numeric',
        ];
    }

    public function process($req){
        try {
            $comment = new Comment();

            $comment->comment = $req['comment'];
            $comment->post_id = $req['post_id'];
            $comment->commented_by = Auth::user()->id;
           
            $comment->save();

            $comments = Comment::where('post_id', $req['post_id'])
            ->with('commentedBy.userInfo')
            ->orderBy('id', 'DESC')->get();

            return [
                'success' => true, 
                'comments' => $comments,
                'msg' => 'Comment has been posted successfully'
            ];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
