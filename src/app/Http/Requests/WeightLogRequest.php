<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogRequest extends FormRequest
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
            'date' => ['required'],
            'weight' => ['required', 'max:999.9', 'regex:/^\d+(\.\d{1})?$/'],
            'calories' => ['required', 'integer'],
            'exercise_time' => ['required'],
            'exercise_content' =>['max:120'],
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'weight.required' => '現在の体重を入力してください',
            'weight.max' => '４桁までの数字で入力してください',
            'weight.regex' => '小数点は１桁で入力してください',
            'calories.required' => '摂取カロリーを入力してください',
            'calories.integer' => '数字で入力してください',
            'exercise_time.required' => '運動時間を入力してください',
            'exercise_content' => '120文字以内で入力してください',
        ];
    }
}
