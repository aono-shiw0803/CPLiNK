<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            'page_url' => 'required',
            'matter' => 'required',
            'service' => 'required',
            'link_url' => 'required',
            'at' => 'required',
            'start_date' => 'required',
        ];
    }

    public function messages(){
      return [
        'page_url.required' => '必須項目です。',
        'matter.required' => '必須項目です。',
        'service.required' => '必須項目です。',
        'link_url.required' => '必須項目です。',
        'at.required' => '必須項目です。',
        'start_date.required' => '必須項目です。',
      ];
    }
}
