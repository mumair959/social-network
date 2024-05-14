<?php

namespace App\Http\Requests\Admin\FAQs;

use App\Models\Faq;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateFAQsRequest extends FormRequest
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
            $faq = Faq::find($req['id']);

            if (empty($faq)) {
                return ['error' => true, 'msg' => 'Faq not found'];
            }

            $faq->question = $req['question'];
            $faq->answer = $req['answer'];
           
            $faq->save();

            return ['success' => true, 'msg' => 'Faq has been updated successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
