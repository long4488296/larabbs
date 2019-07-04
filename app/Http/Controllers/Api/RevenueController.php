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

class RevenueController extends Controller
{
  

    //营收数据
    public function me(Request $request)
    {
        //return $this->response->item( , new UserTransformer());

        $json = '{
            "data": {
              "dangqian":4999,
              "chengjiao":888,
              "yue":6666
            }
          }';
        $data = json_decode($json);

        return $this->response->array([
            'data'=>$data->data,
        ])->setStatusCode(200);
    }

}
