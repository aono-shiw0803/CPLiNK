<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matter' => 'required',
            'service' => 'required',
            'plan' => 'required',
            'staff' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }

    public function messages(){
      return [
        'matter.required' => '必須項目です。',
        'service.required' => '必須項目です。',
        'plan.required' => '必須項目です。',
        'staff.required' => '必須項目です。',
        'start_date.required' => '必須項目です。',
        'end_date.required' => '必須項目です。',
      ];
    }
}
