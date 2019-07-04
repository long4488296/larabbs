<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$skbmapi = app('Dingo\Api\Routing\Router');

$skbmapi->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['serializer:array','cors']
], function($api) {
    
    
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.access.limit'),
        'expires' => config('api.rate_limits.access.expires'),
    ],function($api){
        // // 版本号
        // $api->get('version', function() {
        //     return response('this is version v1');
        // });
        // $api->put('version', function() {
        //     return response('this is version v1');
        // });
    });
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ], function($api) {
        //关于我们
        $api->get('aboutus', 'StaticController@aboutus')
            ->name('api.StaticController.aboutus');
        // 短信验证码
        $api->post('verificationCodes', 'VerificationCodesController@store')
            ->name('api.verificationCodes.store');
        // 用户注册
        $api->post('users', 'UsersController@store')
            ->name('api.users.store');
        // 图片验证码
        $api->post('captchas', 'CaptchasController@store')
            ->name('api.captchas.store');
        // 查看图片验证码    
        $api->get('captchas', 'CaptchasController@show')
            ->name('api.captchas.show');
        // 登录token
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');
        //忘记密码-验证手机是否注册
        $api->post('user/checkphone', 'UsersController@checkphone')
            ->name('api.user.checkphone');
        //忘记密码-发送验证码
        $api->post('user/forgetpassword', 'UsersController@forgetpassword')
            ->name('api.user.forgetpassword');
        //忘记密码-验证手机短信码
        $api->post('user/verificationphone', 'UsersController@verificationphone')
            ->name('api.user.verificationphone');
        //忘记密码-重设登陆密码
        $api->post('user/resetpassword', 'UsersController@resetpassword')
            ->name('api.user.resetpassword');
        // 需要 token 验证的接口
        $api->group(['middleware' => 'api.auth'], function($api) {
            // 刷新token
            $api->put('authorizations/current', 'AuthorizationsController@update')
                ->name('api.authorizations.update');
            // 删除token
            $api->delete('authorizations/current', 'AuthorizationsController@destroy')
                ->name('api.authorizations.destroy');
            // 当前登录用户信息
            $api->get('user', 'UsersController@me')
                ->name('api.user.show');
            //当前用户的首页聚合信息
            $api->get('user/aggregate', 'AggController@me')
                ->name('api.user.aggregate');
             //订单
            $api->get('user/orders', 'OrderController@me')
                ->name('api.user.orders');
            //订单中商品的物流信息
            $api->get('user/orders/logistics', 'LogisticsController@me')
                ->name('api.user.orders.logistics');
            //商品
            //商品聚合
            $api->get('user/commodity', 'CommodityController@index')
                ->name('api.user.commodity');
            //商品单个详情
            $api->get('user/commodity/{commodity}', 'CommodityController@me')
                ->name('api.user.commodity.me');
            //商品单个创建
            $api->post('user/commodity', 'CommodityController@store')
                ->name('api.user.commodity.store');
            //商品单个修改单
            $api->patch('user/commodity/{commodity}', 'CommodityController@update')
                ->name('api.user.commodity.edit');
            $api->delete('user/commodity/{commodity}', 'CommodityController@delete')
                ->name('api.user.commodity.edit');
            //店铺
            $api->get('user/shop', 'ShopController@me')
              ->name('api.user.shop');
            //库存
            $api->get('user/stock', 'StockController@me')
              ->name('api.user.stock');
            //营收数据
            $api->get('user/revenue', 'RevenueController@me')
              ->name('api.user.revenue');
            //财务对账
            $api->get('user/reconciliation', 'ReconciliationController@me')
              ->name('api.user.reconciliation');
            //消息
            $api->get('user/notice', 'NoticeController@me')
              ->name('api.user.notice');
              
        });
    });
});
