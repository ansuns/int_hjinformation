<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id'                  => 'app-api',
    'basePath'            => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap'           => ['log'],
    'modules'             => [
        'v1' => [
            'class' => 'api\modules\v1\Module'
        ],
    ],
    'components'          => [
        'request'      => [
            'csrfParam' => '_csrf-api',
        ],
        'user'         => [
            'identityClass'   => 'api\models\ApiUser',
            'enableAutoLogin' => true,
            'identityCookie'  => ['name' => '_identity-api', 'httpOnly' => true],
            'enableSession' => false, //设置 enableSession 属性为 false
            'loginUrl' => null, //显示一个HTTP 403 错误而不是跳转到登录界面.
        ],
/*        'session'      => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-api',

        ],*/
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => false,
            'showScriptName'      => false,
            'rules'               => [
                [
                    'class'      => 'yii\rest\UrlRule',
                    'controller' => ['v1/icp'],
                ],
                [
                    'class'      => 'yii\rest\UrlRule',
                    'controller' => ['v1/user'=>'v1/default'],
                    'extraPatterns' => [
                        'POST login' => 'login',
                        'POST upload' => 'upload',
                    ]
                ],
            ],
        ],

    ],
    'params'              => $params,
];
