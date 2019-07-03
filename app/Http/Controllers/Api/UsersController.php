<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;
use App\Http\Requests\Api\UserRequest;

class UsersController extends Controller
{
    //注册
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);

        if (!$verifyData) {
            return $this->response->error('验证码已失效', 422);
        }

        if (!hash_equals($verifyData['code'], $request->verification_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }

        $user = User::create([
            'user_name' => $request->name,
            'realname'=>'1',
            'alias' =>'2',
            'msn'=>'1',
            'qq'=>'1',
            'office_phone'=>'1',
            'home_phone'=>'1',
            'credit_line'=>'1',
            'email'=>$request->name,
            'mobile_phone' => $verifyData['phone'],
            'password' => $request->password,
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);
        return $this->response->item($user, new UserTransformer())->setStatusCode(201);
        // return $this->response->item($user, new UserTransformer())
        // ->setMeta([
        //     'access_token' => \Auth::guard('api')->fromUser($user),
        //     'token_type' => 'Bearer',
        //     'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
        // ])
        // ->setStatusCode(201);
    }

    //用户信息
    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }
}
