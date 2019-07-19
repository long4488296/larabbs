<?php
return [
    // HTTP 请求的超时时间（秒）
    'timeout' => 5.0,

    // 默认发送配置
    'default' => [
        // 网关调用策略，默认：顺序调用
        'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,
        // 默认可用的发送网关
        'gateways' => [
            'chuanglan',
        ],
    ],
    // 可用的网关配置
    'gateways' => [
        'errorlog' => [
            'file' => '/tmp/easy-sms.log',
        ],
        'yunpian' => [
            'api_key' => env('YUNPIAN_API_KEY'),
        ],
        'chuanglan' => [
            'account' => 'N7370170',
            'password' => '9BGmn4rzwab71fk',
    
            // \Overtrue\EasySms\Gateways\ChuanglanGateway::CHANNEL_VALIDATE_CODE  => 验证码通道（默认）
            // \Overtrue\EasySms\Gateways\ChuanglanGateway::CHANNEL_PROMOTION_CODE => 会员营销通道
            'channel'  => \Overtrue\EasySms\Gateways\ChuanglanGateway::CHANNEL_VALIDATE_CODE, 
    
            // 会员营销通道 特定参数。创蓝规定：api提交营销短信的时候，需要自己加短信的签名及退订信息
            'sign' => '【时空先生】',
            'unsubscribe' => '回TD退订', 
        ],
    ],
];