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
  

    //首页聚合信息
    public function me(Request $request)
    {
        //return $this->response->item( , new UserTransformer());

        $json = '{
            "data": [{
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
          }';
        $data = json_decode($json);

        return $this->response->array([
            'data'=>$data->data,
        ])->setStatusCode(200);
    }

}
