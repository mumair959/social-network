<?php

namespace App\Http\Requests\Admin\FAQs;

use App\Models\Faq;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetAllFAQsRequest extends FormRequest
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

    public function process(){
        $faqs = Faq::orderBy('id','desc')->paginate(2);
        
        return [
            'success' => true, 
            'faqs' => $faqs
        ];

    }
}
