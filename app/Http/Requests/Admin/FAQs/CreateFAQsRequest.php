<?php

namespace App\Http\Requests\Admin\FAQs;

use App\Models\Faq;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateFAQsRequest extends FormRequest
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
            'question' => 'required|string|max:500',
            'answer' => 'required|string|max:2000',
        ];
    }

    public function process($req){
        try {
            $faq = new Faq();

            $faq->question = $req['question'];
            $faq->answer = $req['answer'];
           
            $faq->save();

            return ['success' => true, 'msg' => 'Faq has been created successfully'];

        } catch (\Exception $ex) {
            return ['error' => true, 'msg' => $ex->getMessage()];
        }
    }
}
