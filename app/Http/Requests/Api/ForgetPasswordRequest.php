<?php
namespace App\Http\Requests\Api;

class ForgetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'phone' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199)\d{8}$/',
                'exists:yj_users,mobile_phone'
                ]
                
        ];
    }
    public function messages()
    {
        return [
            'phone.exists' => '手机号码未被注册.'
        ];
    }
}
