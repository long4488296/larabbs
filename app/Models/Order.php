<?php

namespace App\Models;

class Order extends Model
{
    // use SoftDeletes;
    // const DELETED_AT = 'is_deleted';

    protected $table = 'order_info';
    protected $primaryKey = 'order_id';
    protected $fillable = ['order_id', 'parent_order_id', 'order_sn', 'user_id', 'order_status', 'shipping_status', 'pay_status', 'consignee', 'country', 'province', 'city', 'district', 'address', 'order_address', 'zipcode', 'tel', 'mobile', 'email', 'best_time', 'sign_building', 'postscript', 'shipping_id', 'shipping_name', 'pay_id', 'pay_name', 'how_oos', 'how_surplus', 'pack_name', 'card_name', 'card_message', 'inv_payee', 'inv_content', 'goods_amount', 'shipping_fee', 'insure_fee', 'pay_fee', 'pack_fee', 'card_fee', 'money_paid', 'surplus', 'integral', 'integral_money', 'bonus', 'voucher', 'order_amount', 'from_ad', 'referer', 'add_time', 'confirm_time', 'pay_time', 'shipping_time', 'pack_id', 'card_id', 'bonus_id', 'voucher_id', 'invoice_no', 'extension_code', 'extension_id', 'to_buyer', 'pay_note', 'agency_id', 'inv_type', 'tax', 'is_separate', 'parent_id', 'discount', 'seller_id', 'is_comment', 'isfoder', 'statr', 'collectgoods_time', 'is_ph', 'is_ph_id'];
    protected $visible = ['order_id','shipping_name','order_sn'];
    protected $hidden = [ 'order_sn'];
    
    public $timestamps = false;
    const CREATED_AT = 'add_time';
    const UPDATED_AT = 'last_update';
   
    /**
     * 模型的连接名称
     *
     * @var string
     */
    // protected $connection = 'shopsql';

    public function seller()
    {
        return $this->belongsTo('App\Models\UserSeller','seller_id');
    }
    public function goods()
    {
        return $this->hasMany('App\Models\Good', 'seller_id');
    }
    public function children()
    {
        return $this->hasMany('App\Models\Order', 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Order', 'parent_id');
    }
    public function scopeCuruser($query,User $user){
        // 通过用户获取商家id
        $seller_id = $user->seller->id;   
        return $query;
        return $query->where('seller_id', $seller_id);
    }
    public function scopeWithOrder($query, $order)
    {
        // 不同的排序，使用不同的数据读取逻辑
        
        switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
        // 预加载防止 N+1 问题
        return $query;
        return $query->with('seller', 'category');
        //return $query->with('category');
    }
    public function scopeOrderType($query,$ordertype){
        $matchThese = ['is_on_sale' => 1, 'is_alone_sale' => 1, 'is_delete'=> 0,'check_status'=>1];             
        //return $query->where($matchThese);
        return $query;
    }
}
