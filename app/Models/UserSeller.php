<?php

namespace App\Models;

/*** 
 * 
 * 定义中间表模型
 * UserSeller
*/
class UserSeller extends Model
{
    protected $table = 'user_seller';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','user_id','is_check','checkout_type','use_fee','deposit','fencheng','remark','add_time'
    ];
    /**
     * 模型的连接名称
     *
     * @var string
     */
    // protected $connection = 'shopsql';
    public function goods()
    {
        return $this->hasMany('App\Models\Good', 'seller_id');
    }
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'seller_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
