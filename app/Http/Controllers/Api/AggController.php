<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Transformers\CategoryTransformer;
class AggController extends Controller
{
  

    //首页聚合信息
    public function me(Request $request)
    {
        //return $this->response->item( , new UserTransformer());
        // "data": {
        //     "price": 399999,
        //     "selfmonth": 30,
        //     "selfday": 6,
        //     "sevenday": 15,
        //     "complete": 60,
        //     "daifa": 2
        //   }
        $tra = new CategoryTransformer();
        //$category =$tra->transform(Category::all());
       // $category =Category::all();
        $category = Category::TopLevel()->get();
       // dd($category);
        $re =$category;
        $data = [
            "price"=>399999,//当日成交金额汇总
            "selfmonth"=>30,//本月订单数
            "selfday"=> 6,//今日订单数
            "sevenday"=> 15,//近7日订单数
            "complete"=>60,//已完成
            "daifa"=> 2,//需要发货的订单
            "shop"=>["ischeck"=>true],
            "notice"=>[["id"=>1,"new"=>6,"shijian"=>time()],["id"=>1,"new"=>6,"shijian"=>time()]],
            "category"=>$re,
        ];
         // return $this->response->array([
        //   'data'=>'1'
        //   ])->setStatusCode(200);
        return $this->response->array(
             $data)->setStatusCode(200);
    }

}
