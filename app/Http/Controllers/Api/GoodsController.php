<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Good;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\Api\GoodRequest;
use App\Transformers\GoodTransformer;
use App\Serializers\DataArraySerializer;

class GoodsController extends Controller
{
    //商品
    public function index(GoodRequest $request,Good $good)
    {
        //获取当前用户的商家和旗下商品goods_ids合集 
        $this_user_goods_ids = $this->user()
        ->seller->goods
        ->keyBy('goods_id')
        ->keys();

                               
        $goods = $good->whereIn('goods_id',$this_user_goods_ids)
                      ->orderBy('goods_id','desc')
                      ->paginate(4);
        // $goods = $good->paginate(4);
        
        return $this->response->paginator($goods, new GoodTransformer(),['key' => 'data']);
        //return $this->response->item( $this_user, new UserTransformer());
        // return $this->response->array([
        //   'data'=>'1'
        //   ])->setStatusCode(200);
        //return $this->response->array(['data'=>$data->data,])->setStatusCode(200);
    }

    public function show(GoodRequest $request,Good $good)
    {   
        
        return $this->response->item(
            $good,
            new GoodTransformer(),
            ['key' => 'user'])
            // ->setMeta([
            //     'a'=>1
            // ])
            ->setStatusCode(200);
    }
    
    public function store(GoodRequest $request, Good $good)
    {
        $good->fill($request->all());
        $good->seller_id = $this->user()->seller->id;
        $good->save();
        // return $this->response->array([
        //   'data'=>$this->response
        //   ])->setStatusCode(200);
        return $this->response
        ->item($good, new GoodTransformer())
        ->setStatusCode(201);
    }
    public function update(GoodRequest $request, Good $good)
    {
        //$this->authorize('update', $good);
        $this->user()->givePermissionTo('manage_contents');
        $good->update($request->all());
        return $this->response->item($good, new GoodTransformer())
        ->setMeta([
                'a'=>$this->user()->can('manage_contents')
            ]);
    }

}
