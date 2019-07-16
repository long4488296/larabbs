<?php

namespace App\Transformers;

use App\Models\Good;
use League\Fractal\TransformerAbstract;

class GoodTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['seller', 'category'];
    
    public function transform(Good $good)
    {   
        $a = $good->toArray();
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
        return $this->item($good->seller->user, new UserTransformer());
    }

    public function includeCategory(Good $good)
    {
        return $this->item($good->category, new CategoryTransformer());
    }
}