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
        $data = [
            "price"=>399999,
            "selfmonth"=>30,
            "selfday"=> 6,
            "sevenday"=> 15,
            "complete"=>60,
            "daifa"=> 2
        ];
        return $this->response->array([
            'data' => $data,
        ])->setStatusCode(200);
    }

}
