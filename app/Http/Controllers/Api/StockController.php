<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;
use App\Http\Requests\Api\UserRequest;
use Overtrue\EasySms\EasySms;
use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Http\Requests\Api\RestPasswordRequest;
use App\Http\Requests\Api\ForgetPassword2Request;

class StockController extends Controller
{
      //商品
      public function me(Request $request)
      {
          //return $this->response->item( , new UserTransformer());
  
          $json = '{
              "data": [{
                  "goods_id": "1",
                  "goods_name": "云南蒙自石榴8个",
                  "feel": "果粒爆汁",
                  "guige": "4公斤/箱",
                  "xiaoliang": "400箱",
                  "price": "30",
                  "yuanprice": "70"
                },
                {
                  "goods_id": "2",
                  "goods_name": "云南蒙自石榴8个",
                  "feel": "果粒爆汁",
                  "guige": "4公斤/箱",
                  "xiaoliang": "6s00箱",
                  "price": "30",
                  "yuanprice": "70"
                },
                {
                  "goods_id": "3",
                  "goods_name": "云南蒙自石榴8个",
                  "feel": "果粒爆汁",
                  "guige": "4公斤/箱",
                  "xiaoliang": "40箱",
                  "price": "30",
                  "yuanprice": "70"
                }
              ]
            }';
          $data = json_decode($json);
  
          return $this->response->array([
              'data'=>$data->data,
          ])->setStatusCode(200);
      }
}
