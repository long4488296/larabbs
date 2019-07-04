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

class NoticeController extends Controller
{
  

    //首页聚合信息
    public function me(Request $request)
    {
        //return $this->response->item( , new UserTransformer());
    /**
     * {
     "data": [{
        "id":1,
        "news": 6,
        "shijian": 2300,
    }, {
        "id":2,
        "news": 8,
        "shijian": "刚刚",
    }]
    }
    
    */
    $item = ['id'=>1,'news'=>'欢迎来到商户管理后台。','时间'=>'2300'];
    $item1 = ['id'=>2,'news'=>'您的本月报表已经收到，请前往查看','时间'=>'刚刚'];
    $data = [$item,$item1];
        return $this->response->array([
            'data' => $data,
        ])->setStatusCode(200);
    }

}
