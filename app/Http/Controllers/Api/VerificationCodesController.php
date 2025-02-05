<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use App\Http\Requests\Api\VerificationCodeRequest;

class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        // $captchaData = \Cache::get($request->captcha_key);

        // if (!$captchaData) {
        //     return $this->response->error('图片验证码已失效', 422);
        // }

        // if (!hash_equals($captchaData['code'], $request->captcha_code)) {
        //     // 验证错误就清除缓存
        //     \Cache::forget($request->captcha_key);
        //     return $this->response->errorUnauthorized('图片验证码错误');
        // }

        $phone = $request->phone;

        if (!app()->environment('production')) {
            $code = '1234';
        } else {
            // 生成4位随机数，左侧补0
            $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
    
            try {
                $result = $easySms->send($phone, [
                    'content'  =>  "【时空商城】您的验证码为：{$code}，请在5分钟内输入，为保证账号安全请勿转发他人。"
                ]);
            } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
                $message = $exception->getException('chuanglan')->getMessage();
                return $this->response->errorInternal($message ?: '短信发送异常');
            }
        }

        $key = 'verificationCode_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        // 缓存验证码 10分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

        return $this->response->array([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }
}