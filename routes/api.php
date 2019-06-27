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
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => 'serializer:array'
], function($api) {
    
    
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.access.limit'),
        'expires' => config('api.rate_limits.access.expires'),
    ],function($api){
        // 版本号
        $api->get('version', function() {
            return response('this is version v1');
        });
        $api->put('version', function() {
            return response('this is version v1');
        });
    });
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ], function($api) {
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
        $api->get('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');
        
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
        });
    });
});
