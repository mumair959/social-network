<?php

namespace App\Http\Requests\Admin\Disputes;

use App\Models\ReportComment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetAllCommentsDisputesRequest extends FormRequest
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
        $reported_comments = ReportComment::with('reportedBy')->paginate(config('app.pagination'));
        
        return [
            'success' => true, 
            'reported_comments' => $reported_comments
        ];

    }
}
