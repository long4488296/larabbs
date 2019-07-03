<?php

namespace App\Models;


use Auth;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmailContract, JWTSubject
{
    use HasRoles;
    use MustVerifyEmailTrait;
    use Traits\ActiveUserHelper;
    use Traits\LastActivedAtHelper;
    
    use HasApiTokens;
    use Notifiable {
        notify as protected laravelNotify;
    }

    protected $table = 'yj_users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function findForPassport($username)
    {
        filter_var($username, FILTER_VALIDATE_EMAIL) ?
          $credentials['email'] = $username :
          $credentials['mobile_phone'] = $username;

        return self::where($credentials)->first();
    }
    public function notify($instance)
    {
        // 如果要通知的人是当前用户，就不必通知了！
        if ($this->id == Auth::id()) {
            return;
        }

        // 只有数据库类型通知才需提醒，直接发送 Email 或者其他的都 Pass
        if (method_exists($instance, 'toDatabase')) {
            $this->increment('notification_count');
        }

        $this->laravelNotify($instance);
    }

    protected $fillable = [
        //'name', 'phone','email', 'password', 'introduction', 'avatar',
        'user_id','email','openid','user_name','realname','password','userimg','qrcode','qrcodes','question','answer','sex','birthday','user_money','real_money','gift_money','frozen_money','pay_points','rank_points','address_id','reg_time','last_login','last_time','last_ip','visit_count','user_rank','is_special','ec_salt','salt','parent_id','flag','alias','msn','qq','office_phone','home_phone','mobile_phone','is_validated','credit_line','passwd_question','passwd_answer','utype','addid','activation','paypassword','beginning_money','expense','promoters_id','discount','lifetime_discount','activity','activity_time',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }

    public function setPasswordAttribute($value)
    {
        // // 如果值的长度等于 60，即认为是已经做过加密的情况
        // if (strlen($value) != 60) {

        //     // 不等于 60，做密码加密处理
        //     $value = bcrypt($value);
        // }

        $this->attributes['password'] = $value;
    }
    public  function setRealnameAttribute($value)
    {
        if($value==""){
            $this->attributes['realname'] = "请实名";
        }else{
            $this->attributes['realname'] = "请实名";
        }
        
    }
    public function setAvatarAttribute($path)
    {
        // 如果不是 `http` 子串开头，那就是从后台上传的，需要补全 URL
        if ( ! starts_with($path, 'http')) {

            // 拼接完整的 URL
            $path = config('app.url') . "/uploads/images/avatars/$path";
        }

        $this->attributes['userimg'] = $path;
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
