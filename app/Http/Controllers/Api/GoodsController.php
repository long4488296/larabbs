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
    public function __construct()
    {

        //$this->middleware('auth', ['except' => ['index', 'show']]);
    }

    //商品
    public function index(GoodRequest $request,Good $good)
    {
        //$bookmarks = Auth::user()->bookmarks;
        // $this_user = $this->user();
        // $goods = $this_user->seller()
        // //->where('seller_cat_id','>',0)
        // // ->where('cat_id','!=', 327)
        // //->withOrder($request->order)
        // ->paginate(20);
        // if($goods['total']==0){
           
        //     //->where('seller_cat_id','>',0)
        //     // ->where('cat_id','!=', 327)
            
            
        // }
    //     $query = $good->query();
    //     if ($categoryId = $request->category_id) {
    //       $query->where('category_id', $categoryId);
    //   }
    //   switch ($request->order) {
    //     case 'recent':
    //         $query->recent();
    //         break;

    //     default:
    //         $query->recentReplied();
    //         break;
    // }

    //     $goods = $query->paginate();
        $goods = $good->where('goods_id','>',1)
                      ->orderBy('goods_id', 'desc')
                      ->paginate(5);
                        // return $this->response->array([
                        //     $request->order
                        //       ])->setStatusCode(200);
        return $this->response->paginator($goods, new GoodTransformer(),['key' => 'data']);
        //return $this->response->item( $this_user, new UserTransformer());
        // return $this->response->array([
        //   'data'=>$goods
        //   ])->setStatusCode(200);
        //return $this->response->array(['data'=>$data->data,])->setStatusCode(200);
    }

    public function show(GoodRequest $request,Good $good,$goods_id)
    {   
        $goods = $good->where('goods_id', $goods_id)
                       ->firstOrFail();
        
        return $this->response->item(
            $goods,
            new GoodTransformer(),
            function ($resource, $fractal) {
                $fractal->setSerializer(new DataArraySerializer);
            })
            ->setStatusCode(200);
    }
    public function store(GoodRequest $request, Good $good)
    {
        $good->fill($request->all());
        $good->seller_id = $this->user()->user_id;
        $good->save();
        // return $this->response->array([
        //   'data'=>$this->response
        //   ])->setStatusCode(200);
        return $this->response
        ->item($good, new GoodTransformer())
        ->setStatusCode(201);
    }

}
