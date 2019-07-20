<?php

namespace App\Models;


use Auth;
//use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Laravel\Passport\HasApiTokens;
use Illuminate\Auth\Access\AuthorizationException;
class User extends Authenticatable implements MustVerifyEmailContract, JWTSubject
{
    //use HasRoles;
    use MustVerifyEmailTrait;
    use Traits\ActiveUserHelper;
    use Traits\LastActivedAtHelper;
    
    use HasApiTokens;
    use Notifiable {
        notify as protected laravelNotify;
    }
    /**
     * 模型的连接名称
     *
     * @var string
     */
    // protected $connection = 'shopsql';
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    public function seller()
    {
        return $this->hasOne(UserSeller::class, 'user_id');
    }
    public function findForPassport($username)
    {
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $username;
        } elseif (preg_match("/^(?:\+?86)?1(?:3\d{3}|5[^4\D]\d{2}|8\d{3}|7(?:[35678]\d{2}|4(?:0\d|1[0-2]|9\d))|9[189]\d{2}|66\d{2})\d{6}$/", $username)) {
            $credentials['mobile_phone'] = $username;
        } else {
            $credentials['user_name'] = $username;
        }
        //return self::first();
        //$credentials['utype'] = 3;//用户类型3，商户
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
        'password', 'remember_token','paypassword',
    ];

    public function isAuthorOf($model)
    {
        return $this->seller->id == $model->seller_id;
    }

    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }
    public function getAuthPassword() {
        //这样数据库字段为 passwords 也是可以认证的。
        //return ['password' => $this->attributes['password'], 'salt' => $this->attributes['salt']];
        return $this->password;
    }
    public function setPasswordAttribute($value)
    {
        // 如果值的长度等于 32，即认为是已经做过加密的情况
        if (strlen($value) != 32) {

            // 不等于 60，做密码加密处理
           // $value = bcrypt($value);
           $value = md5($value);
        }

        $this->attributes['password'] = $value;
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
    public function validateForPassportPasswordGrant($password)
    {
        # code...
        if($this->attributes['utype']!=3){
            throw new AuthorizationException('Current landing users are not business users.['.$this->attributes['user_id']);
        }
        if(is_null($this->attributes['ec_salt'])){
            return md5($password)==$this->getAuthPassword();
        }else{
            return md5(md5($password).$this->attributes['ec_salt'])==$this->getAuthPassword();
        }
    }
}
