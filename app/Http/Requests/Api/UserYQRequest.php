<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

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
        ];
    }
    public function attributes()
    {
        return [
            'promoter' => '邀请码不正确',
            'phone' => '手机注册过',
        ];
    }
}
