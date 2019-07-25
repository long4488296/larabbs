<?php

namespace App\Models;

/*** 
 * 
 * 消息
 * Message
*/
class Message extends Model
{
    protected $table = 'message';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'type_id', 'message_content', 'add_time', 'statr', 'user_id', 'order_sn', 'read_unread'
    ];
    public function scopeCuruser($query,User $user){
        $user_id = $user->user_id;   
        return $query->where('user_id', $user_id);
    }
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'order_sn');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function scopeNew($query){

        $matchThese = ['type_id' => 2, 'read_unread'=> 2]; 
        return $query->where($matchThese);
    }
}
