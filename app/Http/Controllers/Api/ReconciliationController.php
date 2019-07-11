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

class ReconciliationController extends Controller
{
  

    //财务平台
    public function me(Request $request)
    {
        //return $this->response->item( , new UserTransformer());

        $json = '{"data":{
          "dangqian": 4999,
          "chengjiao": 888,
          "yue": 6666,
            "shops": [{
                "dian_id": 1,
                "zongjine": 48.99,
                "yingfu": 2222,
                "yifu": 3333,
                "dian_name": "程圆圆的店",
                "zhangkuan": 666668,
                "smalljin": 88,
                "yingshou": 10000,
                "shijian": "2019 - 03 - 07",
                "xiaoshouzonge": 60000,
                "yijiesuan": 30000,
                "weijiesuan": 10000
              },
              {
                "dian_id": 2,
                "zongjine": 48.99,
                "yingfu": 2222,
                "yifu": 3333,
                "dian_name": "程圆圆的店",
                "zhangkuan": 6555,
                "smalljin": 88,
                "yingshou": 30000,
                "shijian": "2019 - 07 - 07",
                "xiaoshouzonge": 80000,
                "yijiesuan": 10000,
                "weijiesuan": 70000
              }
            ]
          }
        }';
        $data = json_decode($json);

        return $this->response->array([
            'data'=>$data->data,
        ])->setStatusCode(200);
    }
    //财务平台
    public function sj(Request $request)
    {
        //return $this->response->item( , new UserTransformer());

        $json = '{"data":{
          "zongjine":"32222",
            "orders": [{
                "dian_id": 1,
                "good_name": "香蕉",
                "jiesuan": 48,
                "shoujia": 50,
                "shuliang": 3,
                "yingfu": 144
              },
              {
                "dian_id": 2,
                "good_name": "马铃薯",
                "jiesuan": 48,
                "shoujia": 50,
                "shuliang": 3,
                "yingfu": 144
              },
              {
                "dian_id": 3,
                "good_name": "地瓜",
                "jiesuan": 48,
                "shoujia": 50,
                "shuliang": 3,
                "yingfu": 144
              },
              {
                "dian_id": 4,
                "good_name": "山药",
                "jiesuan": 48,
                "shoujia": 50,
                "shuliang": 3,
                "yingfu": 144
              },
              {
                "dian_id": 5,
                "good_name": "土豆",
                "jiesuan": 48,
                "shoujia": 50,
                "shuliang": 3,
                "yingfu": 144
              },
              {
                "dian_id": 6,
                "good_name": "粽子",
                "jiesuan": 48,
                "shoujia": 50,
                "shuliang": 3,
                "yingfu": 144
              },
              {
                "dian_id": 7,
                "good_name": "奥利奥",
                "jiesuan": 48,
                "shoujia": 50,
                "shuliang": 3,
                "yingfu": 144
              },
              {
                "dian_id": 8,
                "good_name": "大盒奥利奥",
                "jiesuan": 48,
                "shoujia": 50,
                "shuliang": 3,
                "yingfu": 144
              }
            ]
          }}';
        $data = json_decode($json);

        return $this->response->array([
            'data'=>$data->data,
        ])->setStatusCode(200);
    }
}
