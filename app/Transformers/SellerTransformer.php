<?php

namespace App\Transformers;

use App\Models\UserSeller;
use League\Fractal\TransformerAbstract;

class SellerTransformer extends TransformerAbstract
{
    public function transform(UserSeller $seller)
    {   return $seller->toArray();
    }
}