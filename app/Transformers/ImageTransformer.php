<?php

namespace App\Transformers;

use App\Models\Image;
use League\Fractal\TransformerAbstract;

class ImageTransformer extends TransformerAbstract
{
    public function transform(Image $image)
    {
       
        $a = $image->toArray();
        $a['thumb_url'] = $image->thumb_url;
        $a['img_url'] = $image->img_url;
        $a['goods_id'] = (int)$image->goods_id;
        // $a['user'] = $good->user;
        //$a['category'] = $good->category;
        return $a;
        // return [
        //     'id' => $image->id,
        //     'user_id' => $image->user_id,
        //     'type' => $image->type,
        //     'path' => $image->path,
        //     'created_at' => (string) $image->created_at,
        //     'updated_at' => (string) $image->updated_at,
        // ];
    }
}