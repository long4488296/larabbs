<?php

namespace App\Models;

class Good extends Model
{
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
    protected $fillable = [
        'goods_id','cat_id','seller_cat_id','goods_sn','goods_name','goods_name_style','click_count','brand_id','provider_name','goods_number','goods_weight','market_price','shop_price','buying_price','promote_price','promote_start_date','promote_end_date','warn_number','keywords','goods_brief','goods_desc','goods_thumb','goods_img','original_img','is_real','extension_code','is_on_sale','is_alone_sale','is_shipping','integral','add_time','sort_order','is_delete','is_best','is_new','is_hot','is_promote','bonus_type_id','last_update','goods_type','seller_note','give_integral','rank_integral','suppliers_id','is_check','check_status','check_cause','check_user','seller_id','packing_list','is_display','sales_volume','m_goods_desc','m_goods_img','m_goods_thumb','m_original_img','shipping_id','video_id','origin','suttle','conditions','shelflife','safety',
    ];
    const CREATED_AT = 'add_time';
    const UPDATED_AT = 'last_update';
    public $timestamps = false;
    /**
     * 模型的连接名称
     *
     * @var string
     */
    protected $connection = 'shopsql';
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id');
    }
    public function seller()
    {
        return $this->belongsTo('App\Models\UserSeller','seller_id');
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
        
        return $query->with('user', 'category');
        //return $query->with('category');
    }

    public function scopeRecentReplied($query)
    {
        // 当话题有新回复时，我们将编写逻辑来更新话题模型的 reply_count 属性，
        // 此时会自动触发框架对数据模型 updated_at 时间戳的更新
        return $query->orderBy('goods_id', 'desc');
    }

    public function scopeRecent($query)
    {
        // 按照创建时间排序
        return $query->orderBy('goods_id', 'desc');
    }

}
