<?php

namespace App\Http\Requests\Api;

class UserYQRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
            'phone' => 'required|between:3,25|regex:/[\w\x{4e00}-\x{9fa5}]{2,25}/u|unique:yj_users,mobile_phone',
            'password' => 'required|string|min:6',
            'promoter' => 'required|string|size:6|exists:yj_promoters,promoters_sn',
            'verification_key' => 'required|string',
            'verification_code' => 'required|string',
        ];
    }
    public function attributes()
    {
        return [
            'password' => '注册密码',
            'promoter' => '邀请码',
            'phone' => '手机号码',
            //'phone.Exists'=>'该手机号已经注册。',
            'verification_key' => '短信验证码key',
            'verification_code' => '短信验证码'
        ];
    } 
    public function messages()
    {
        return [
            'phone.unique'=>'该手机号已经注册。',
            'promoter.Exists'=>'邀请码不存在'
        ];
    } 
    
}
