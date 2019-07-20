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
    //protected $connection = 'shopsql';
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id');
    }
    public function seller()
    {
        return $this->belongsTo('App\Models\UserSeller','seller_id');
    }
    public function scopeCuruser($query,User $user){
        // 通过用户获取商家下所有上架商品
        $seller_id = $user->seller->id;   
        return $query->where('seller_id', $seller_id);
    }
    public function scopeOnsale($query)
    {
         // 通过用户获取商家上架的商品
        $matchThese = ['is_on_sale' => 1, 'is_alone_sale' => 1, 'is_delete'=> 0,'check_status'=>1];             
        return $query->where($matchThese);
    }
    public function scopeUnsale($query)
    {
        // 通过用户获取商家下 下架商品
        $matchThese = ['is_on_sale' => 0, 'is_alone_sale' => 1, 'is_delete'=> 0,'check_status'=>1];             
        return $query->where($matchThese);
    }
    public function scopeWaitcheck($query)
    {
        // 通过用户获取商家下 未审核通过的商品
        $matchThese = ['is_alone_sale' => 1, 'is_delete'=> 0];             
        return $query->where($matchThese)->where('check_status','<>',1);
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
        
        return $query->with('seller', 'category');
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
        return $query->orderBy('goods_id', 'asc');
    }
       /**
     * @param   \Illuminate\Database\Eloquent\Builder $query
     * @param     $column
     * @param     $value
     * @param     $side
     * @param     $isNotLike
     * @param     $isAnd
     * @return    \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLike($query, $column, $value, $side = 'both', $isNotLike = false, $isAnd = true)
    {
        if(!$value){return $query;}
        $operator = $isNotLike ? 'not like' : 'like';

        $escape_like_str = function ($str) {
            $like_escape_char = '!';

            return str_replace([$like_escape_char, '%', '_'], [
                $like_escape_char.$like_escape_char,
                $like_escape_char.'%',
                $like_escape_char.'_',
            ], $str);
        };

        switch ($side) {
            case 'none':
                $value = $escape_like_str($value);
                break;
            case 'before':
            case 'left':
                $value = "%{$escape_like_str($value)}";
                break;
            case 'after':
            case 'right':
                $value = "{$escape_like_str($value)}%";
                break;
            case 'both':
            case 'all':
            default:
                $value = "%{$escape_like_str($value)}%";
                break;
        }

        return $isAnd ? $query->where($column, $operator, $value) : $query->orWhere($column, $operator, $value);
    }

    public function scopeOrLike($query, $column, $value, $side = 'both', $isNotLike = false)
    {
        return $query->like($column, $value, $side, $isNotLike, false);
    }

    public function scopeNotLike($query, $column, $value, $side = 'both', $isAnd = true)
    {
        return $query->like($column, $value, $side, true, $isAnd);
    }

    public function scopeOrNotLike($query, $column, $value, $side = 'both')
    {
        return $query->like($column, $value, $side, true, false);
    }

}
