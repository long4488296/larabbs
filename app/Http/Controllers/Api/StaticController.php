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

class StaticController extends Controller
{
  

    //静态内容-关于我们
    public function aboutus(Request $request)
    {
        //return $this->response->item( , new UserTransformer());

        return $this->response->array([
            'mm' => '静态内容-关于我们',
        ])->setStatusCode(200);
    }

}
