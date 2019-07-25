<?php

namespace App\Transformers;

use App\Models\Good;
use League\Fractal\TransformerAbstract;

class GoodTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['seller', 'category','user'];
    
    public function transform(Good $good)
    {   
        $a = $good->toArray();
        $a['salesvolume'] = 100000;
        //$a['goods_name'] = $good->goods_name;
        // $a['user'] = $good->user;
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

    public function includeSeller(Good $good)
    {
        if($good->seller){
            return $this->item($good->seller, new SellerTransformer());
        }else{
            return null;
        }
        
    }
    public function includeUser(Good $good)
    {
        if($good->seller){
            return $this->item($good->seller->user, new UserTransformer());
        }else{
            return null;
        }
        
    }
    public function includeCategory(Good $good)
    {
        return $this->item($good->category, new CategoryTransformer());
    }
}