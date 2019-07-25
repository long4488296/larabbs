<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\OrderGoods;
use App\Models\Good;
use App\Models\Order;
use App\Models\Message;
use App\Transformers\CategoryTransformer;
class AggController extends Controller
{
  

    //首页聚合信息
    public function me(Request $request)
    {
        $user_id = $this->user()->user_id;
        $this->user()->seller->id  = 0;
        $seller_id = $this->user()->seller->id;
        //金额汇总
        $price = DB::table('order_goods as o')
                    ->where('seller_id', $seller_id)
                    ->leftJoin('goods as g', 'o.goods_id', '=', 'g.goods_id')
                    ->sum("g.shop_price");
        
         //本月/日/周订单数
        $selfmonth  = Order::Curuser($this->user())->OrderType(2)->ThisMonth()->count();
        $selfday    = Order::Curuser($this->user())->OrderType(2)->ThisDay()->count();
        $sevenday   = Order::Curuser($this->user())->OrderType(2)->This7Day()->count();
        $complete   = Order::Curuser($this->user())->OrderType(5)->count();
        $daifa      = Order::Curuser($this->user())->OrderType(3)->count();
        //商户信息
        $shop = $this->user()->seller;
        //消息
        $notice =[["id"=>1,"new"=>6,"shijian"=>time()],["id"=>1,"new"=>6,"shijian"=>time()]];
        $new_order_message = Message::Curuser($this->user())->New()->count();
        $new_logistic_message = Message::Curuser($this->user())->New()->count();
        $notice =[
            "order"=>["new"=>$new_order_message,"shijian"=>time()],
            "logistic"=>["new"=>$new_logistic_message,"shijian"=>time()]
        ];
        //分类信息
        $category = Category::TopLevel()->get();
        //拼装数据
        $data = [
            "price"=>$price,//当日成交金额汇总
            "selfmonth"=>$selfmonth,//本月订单数
            "selfday"=> $selfday,//今日订单数
            "sevenday"=> $sevenday,//近7日订单数
            "complete"=>$complete,//已完成
            "daifa"=> $daifa,//需要发货的订单
            "shop"=>$shop,
            "notice"=>$notice,
            "category"=>$category,
        ];
         // return $this->response->array([
        //   'data'=>'1'
        //   ])->setStatusCode(200);
        return $this->response->array(
             $data)->setStatusCode(200);
    }

}
