<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSeller extends Model
{
    protected $table = 'yj_user_seller';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','user_id','is_check','checkout_type','use_fee','deposit','fencheng','remark','add_time'
    ];
    public function goods()
    {
        return $this->belongsTo(Good::class,'seller_id');
    }
}
