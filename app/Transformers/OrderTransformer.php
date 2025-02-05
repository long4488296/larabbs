<?php

namespace App\Transformers;

use App\Models\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['seller','user','good'];
    
    public function transform(Order $order)
    {   
        $a = $order->toArray();
        //$a['shipping_name'] = $order->shipping_name;
        //$a['user'] = $order->order_status.$order->shipping_status.$order->pay_status;
        //$a['category'] = $good->category;
        return $a;
        // return [
        //     'id' => $good->goods_id,
        //     // 'title' => $topic->title,
        //     // 'body' => $topic->body,
        //     // 'user_id' => $topic->user_id,
        //     // 'category_id' => $topic->category_id,
        //     // 'reply_count' => $topic->reply_count,
        //     // 'view_count' => $topic->view_count,
        //     // 'last_reply_user_id' => $topic->last_reply_user_id,
        //     // 'excerpt' => $topic->excerpt,
        //     // 'slug' => $topic->slug,
        //     // 'created_at' => $topic->created_at->toDateTimeString(),
        //     // 'updated_at' => $topic->updated_at->toDateTimeString(),
        // ];
    }

    public function includeSeller(Order $order)
    {
        if($order->seller){
            return $this->item($order->seller, new SellerTransformer());
        }else{
            return null;
        }
        
    }
    public function includeGood(Order $order)
    {
        return $this->collection($order->good, new OrderGoodTransformer());
       
        
        
    }
    public function includeUser(Order $order)
    {
        if($order->user){
        return $this->item($order->user, new UserTransformer());
        }else{
            return null;
        }
    }
}