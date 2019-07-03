<?php
namespace App\Http\Requests\Api;

class RestPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'captcha_key'=>'required',
            'captcha_code'=>'required',
            'password' => 'required|string|min:6',  
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'captcha_key' => 'key 不能为空.',
    //         'captcha_code' => '手机短信验证码不能为空.'
    //     ];
    // }
}
