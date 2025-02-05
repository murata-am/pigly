<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step2Request extends FormRequest
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
            'weight' => ['required', 'max:999.9', 'regex:/^\d+(\.\d{1})?$/'],
            'target_weight' => ['required', 'max:999.9', 'regex:/^\d+(\.\d{1})?$/'],
        ];
    }

    public function messages()
    {
        return [
            'weight.required' => '現在の体重を入力してください',
            'weight.max' => '４桁までの数字で入力してください',
            'weight.regex' => '小数点は１桁で入力してください',
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.max' => '４桁までの数字で入力してください',
            'target_weight.regex' => '小数点は１桁で入力してください',
        ];
    }
}
