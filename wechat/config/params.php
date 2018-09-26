<?php
return [
    'adminEmail' => 'admin@example.com',
    'wechat' => [
        'app_id' => 'wxdc731455d1970f9e',
        'secret' => 'b3e55f3562dd316e0a2eb0a2eebbcedc',
        'token' => 'wechat',
        // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
        'response_type' => 'array',

        'log' => [
            'level' => 'debug',
            'file' => Yii::$app->getRuntimePath() . '/logs/wechat.log',
        ],
    ]
];
