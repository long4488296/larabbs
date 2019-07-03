<?php
namespace App\Http\Requests\Api;

class ForgetPassword2Request extends FormRequest
{
    public function rules()
    {
        return [
            'captcha_key' => 'required|string',
            'captcha_code' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'captcha_key' => '手机验证 key',
            'captcha_code' => '手机验证码',
        ];
    }
}
