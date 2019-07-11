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

class OrderController extends Controller
{
  

            //首页聚合信息
            public function me(Request $request)
            {
                //return $this->response->item( , new UserTransformer());
                $json = '{"data":{
                    "order_id":"12312313123",
                    "jine":"2100",
                    "shouhuoren":{"name":"张望","phone":"15213122","dizhi":"朝阳"},
                    "goods": [{
                        "dingdanhao": 2345688,
                        "goods_id": 1,
                        "goods_name": "石榴",
                        "guige": "4公斤/箱",
                        "price": 36,
                        "yuanprice": 80,
                        "member": "张武",
                        "phone": 13456788888,
                        "address": "北京市昌平区",
                        "num": 2,
                        "gongji": 72
                    },
                    {
                        "dingdanhao": 2345688,
                        "goods_id": 2,
                        "goods_name": "苹果",
                        "guige": "5公斤/箱",
                        "price": 36,
                        "yuanprice": 80,
                        "member": "张武",
                        "phone": 13456788888,
                        "address": "北京市昌平区",
                        "num": 2,
                        "gongji": 72
                    },
                    {
                        "dingdanhao": 2345688,
                        "goods_id": 3,
                        "goods_name": "李子",
                        "guige": "2公斤/箱",
                        "price": 36,
                        "yuanprice": 80,
                        "member": "张武",
                        "phone": 13456788888,
                        "address": "北京市昌平区",
                        "num": 2,
                        "gongji": 72
                    }
                    ]
                }}';
                $data = json_decode($json);

                return $this->response->array([
                    'data'=>$data->data,
                ])->setStatusCode(200);
            }

}
