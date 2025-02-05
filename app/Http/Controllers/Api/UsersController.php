<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;
use App\Http\Requests\Api\UserRequest;
use App\Http\Requests\Api\UserYQRequest;
use Overtrue\EasySms\EasySms;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Http\Requests\Api\RestPasswordRequest;
use App\Http\Requests\Api\ForgetPassword2Request;
use App\Http\Services\APIHelper;
use App\Exceptions\Api\CommonException;



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
    //邀请码注册
    public function erstore(UserYQRequest $request)
    { 
        
        $verifyData = \Cache::get($request->verification_key);

        if (!$verifyData) {
            return $this->response->error('验证码已失效.', 422);
            //throw new CommonException('验证码已失效',422);
        }

        if (!hash_equals($verifyData['code'], $request->verification_code)) {
            // 返回401
            return $this->response->error('验证码错误.',422);
            //throw new CommonException('验证码错误',422);
        }
        
        $promoters = DB::connection('shopsql')->table('promoters')->where('promoters_sn',$request->promoter)->first();
        $promoters_id = 0;
       
        if($promoters){
            $promoters_id=$promoters->promoters_id;
        }
       
        $phone = $verifyData['phone'];
        $user = User::create([
            'user_name' => $phone,
            'realname'=>'未实名',
            'alias' =>'　',
            'promoters_id'=>$promoters_id,
            'msn'=>'　',
            'qq'=>'　',
            'office_phone'=> $phone,
            'home_phone'=> $phone,
            'credit_line'=>'0',
            'email'=>$phone,
            'mobile_phone' => $phone,
            'password' => $request->password,
        ]);
        \Cache::forget($request->verification_key);
        //return $this->response->item(User::find($user->user_id), new UserTransformer())->setStatusCode(201);
        
        $data = [
            'user_id'=>$user->user_id,
            'user_name'=>$user->user_name,
            'promter_id'=>$promoters->user_id,
            'skstr'=>md5($user->user_id.$user->user_name.$promoters->user_id)
        ];
        
        
        $api = new APIHelper();
        $res =$api->post($data,'');
        $isreg = json_decode($res);
        return $this->response->array([
            'userid'=>$user->user_id,
            'phone' => $phone,
            'isreg' => true,
            'bonuses'=>$isreg
        ])->setStatusCode(201);
    }
    //注册用户领取奖励
    public function ergetreward(Request $request)
    {
        $data = [
            'uid'=>$request->uid,
            // 'skstr'=>md5($user->user_id.$user->user_name.$user->promoters_id)
        ];
        $api = new APIHelper();
        $res =$api->post1($data,'');
        $isreg = json_decode($res);
        
        return $this->response->array($res)->setStatusCode(200);
    }
    //用户信息
    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }
    //找回密码-判断手机是否注册
    public function checkphone(ForgetPasswordRequest $request){
        $phone = $request->phone;
        return $this->response->array([
            'phone' => $phone,
            'isreg' => true
        ])->setStatusCode(200);
    }
    //找回密码-发送短信
    public function forgetpassword(ForgetPasswordRequest $request, EasySms $easySms){
        $phone = $request->phone;
        if (!app()->environment('production')) {
            $code = '6666';
        } else {
            // 生成4位随机数，左侧补0
            $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
    
            try {
                $result = $easySms->send($phone, [
                    'content'  =>  "【时空先生】您的验证码为：{$code}，请在5分钟内输入，为保证账号安全请勿转发他人。"
                ]);
            } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
                $message = $exception->getException('chuanglan')->getMessage();
                return $this->response->errorInternal($message ?: '短信发送异常');
            }
        }

        $key = 'forgetpasswordCode_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        // 缓存验证码 10分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
        return $this->response->array([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(200);
    }
    //验证手机短信码
    public function verificationphone(ForgetPassword2Request $request){
        
        $verifyData = \Cache::get($request->captcha_key);
       

        if (!$verifyData) {
            return $this->response->error('验证码已失效', 422);
        }

        if (!hash_equals($verifyData['code'], $request->captcha_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }
        $phone = $verifyData['phone'];

        return $this->response->array([
            'phone' => $phone,
            'mm' => '手机短信验证码通过',
        ])->setStatusCode(200);
    }
    //找回密码-重设密码
    public function resetpassword(RestPasswordRequest $request){
        $verifyData = \Cache::get($request->captcha_key);
        $password = $request->password;

        if (!$verifyData) {
            return $this->response->error('验证码已失效', 422);
        }

        if (!hash_equals($verifyData['code'], $request->captcha_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }
        //通过手机获取用户
        
        $user = user::where('mobile_phone', $verifyData['phone'])->first();
        $attributes = $request->only(['password']);
        //修改密码
        $user->update($attributes);
        //清理缓存
        \Cache::forget($request->captcha_key);
        //返回结果并生成新的token
        return $this->response->item($user, new UserTransformer());
        // return $this->response->item($user, new UserTransformer())
        // ->setMeta([
        //     'access_token' => \Auth::guard('api')->fromUser($user),
        //     'token_type' => 'Bearer',
        //     'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
        // ])
        // ->setStatusCode(201);

    }
}
