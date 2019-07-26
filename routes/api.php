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
    'middleware' => ['serializer:default_array','cors','bindings']
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
        $api->post('erusers', 'UsersController@erstore')
            ->name('api.users.erstore');
        $api->post('ergetreward', 'UsersController@ergetreward')
            ->name('api.users.ergetreward');
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
             //订单聚合
             $api->get('user/order', 'OrderController@index')
             ->name('api.user.order');
            //商品单个详情
            $api->get('user/order/{order}', 'OrderController@show')
                ->name('api.user.order.show');
            //订单单个创建
            $api->post('user/order', 'OrderController@store')
                ->name('api.user.order.store');
            //订单单个修改单
            $api->patch('user/order/{order}', 'OrderController@update')
                ->name('api.user.order.edit');
            $api->patch('user/order/{order}/shipping', 'OrderController@shipping')
                ->name('api.user.order.shipping');
            $api->delete('user/order/{order}', 'OrderController@delete')
                ->name('api.user.order.delete');
            //订单中商品的物流信息
            $api->get('user/order/logistics', 'LogisticsController@me')
                ->name('api.user.order.logistics');
            //商品
            //商品聚合
            $api->get('user/good', 'GoodController@index')
                ->name('api.user.good');
            //商品单个详情
            $api->get('user/good/{good}', 'GoodController@show')
                ->name('api.user.good.show');
            //商品单个创建
            $api->post('user/good', 'GoodController@store')
                ->name('api.user.good.store');
            //商品单个修改单
            $api->patch('user/good/{good}', 'GoodController@update')
                ->name('api.user.good.edit');
            $api->patch('user/good/{good}/sele', 'GoodController@sele')
                ->name('api.user.good.sele');
            $api->patch('user/good/{good}/unsele', 'GoodController@unsele')
                ->name('api.user.good.unsele');
            $api->delete('user/good/{good}', 'GoodController@delete')
                ->name('api.user.good.delete');
            //店铺
            $api->get('user/shop', 'ShopController@me')
                ->name('api.user.shop');
            $api->post('user/shop/getcaptcha', 'ShopController@getCaptcha')//获取验证码
                ->name('api.user.shop.getcaptcha');
            $api->post('user/shop/entcert', 'ShopController@EnterpriseCertification')//企业认证
                ->name('api.user.shop.entcert');
            $api->post('user/shop/percert', 'ShopController@PersonalCertification')//个人认证
                ->name('api.user.shop.percert');
            $api->post('user/shop/location', 'ShopController@ShopLocation')//店铺位置
                ->name('api.user.shop.location');
            //库存
            $api->get('user/stock', 'StockController@me')
              ->name('api.user.stock');
            //营收数据
            $api->get('user/revenue', 'RevenueController@me')
              ->name('api.user.revenue');
            //财务对账
            $api->get('user/reconciliation', 'ReconciliationController@me')
              ->name('api.user.reconciliation');
              $api->get('user/reconciliation/sj', 'ReconciliationController@sj')
              ->name('api.user.reconciliation_js');
            //消息
            $api->get('user/notice', 'NoticeController@me')
              ->name('api.user.notice');
            //用户相册
            //图片资源
            $api->post('user/images', 'ImagesController@store')
                ->name('api.user.images.store');
              
        });
    });
});
