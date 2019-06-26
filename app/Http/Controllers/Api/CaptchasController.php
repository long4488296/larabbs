<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests\Api\CaptchaRequest;
use Illuminate\Support\Facades\Storage;

class CaptchasController extends Controller
{
    public function store(CaptchaRequest $request, CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-'.str_random(15);
        $phone = $request->phone;

        $captcha = $captchaBuilder->build();
        $expiredAt = now()->addMinutes(2);
        \Cache::put($key, ['phone' => $phone, 'code' => $captcha->getPhrase()], $expiredAt);
        // 将图片写入文件中
        Storage::put("public/{$key}.jpg", $captcha->inline(), 'public');
        // //$path = Storage::putFile('public/static/Captchas', $captcha->inline());
        // $url_ = Storage::url("public/{$key}.jpg");
        // $url = asset("api/show/{$key}.jpg");
        //Storage::delete('file.jpg');
        // 返回的URL地址为
        // $path = Storage::putFile('public/uploads/avatars',$captcha->inline());
        // $path_ = Storage::url($path);
        // $url = asset($path_);
        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
            'captcha_img' => $captcha->inline()
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
    public function show(Request $request) {
        $captchaData = \Cache::get($request->captcha_key);
        if (!$captchaData) {
            return $this->response->errorUnauthorized('图片验证码失效');
        }
        return Storage::download('public/{$request->captcha_key}.jpg');
        //return $this->response->errorUnauthorized($captcha->getPhrase());
    }
}
