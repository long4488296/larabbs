<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageM extends Model
{
    protected $table = 'm_goods_gallery';
    protected $primaryKey = 'img_id';
    //能批量赋值
    protected $fillable = ['img_id', 'goods_id', 'user_id', 'img_url', 'img_desc', 'thumb_url', 'img_original' ];
    //不能批量赋值
    protected $guarded = ['cat_id', 'cat_name']; //这些字段禁止维护
    protected $visible = ['img_id','goods_id','user_id','img_url','img_desc','thumb_url', 'img_original'];
    protected $hidden = [ 'order_sn'];

    public $timestamps = false;
    const CREATED_AT = 'add_time';
    const UPDATED_AT = 'last_update';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
