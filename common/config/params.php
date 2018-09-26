<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'wechat' => [
        'app_id' => 'wxf732bcda33f3fdac',
        'secret' => '46e25b70ce9008400a8a654681bfc786',
        'token' => 'wechat',
        // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
        'response_type' => 'array',

        'log' => [
            'level' => 'debug',
            'file' => dirname(dirname(__DIR__)) . '/wechat' . '/runtime/logs/wechat.log',
        ],
    ]
];
