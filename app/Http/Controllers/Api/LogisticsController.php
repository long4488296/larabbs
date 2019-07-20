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

class LogisticsController extends Controller
{
  

    //物流信息
    public function me(Request $request)
    {
        //return $this->response->item( , new UserTransformer());

        $json = '{
            "data": [
              {
              "yi": "北京市昌平区【小刘】揽收北京市昌平区【小刘】揽收北京市昌平区【小刘】揽收北京市昌平区【小刘】揽收",
              "shijian": "2019-01-2022:10"
            }, {
              "yi": "北京市昌平区【小cheng",
              "shijian": "2019-01-2022:10"
            },{
              "yi": "北京市昌平区【小cheng",
              "shijian": "2019-01-2022:10"
            },{
              "yi": "北京市昌平区【小cheng",
              "shijian": "2019-01-2022:10"
            },{
              "yi": "北京市昌平区【小cheng",
              "shijian": "2019-01-2022:10"
            }
            ]
          }';
        $data = json_decode($json);

        return $this->response->array([
            'data'=>$data->data,
        ])->setStatusCode(200);
    }

}
