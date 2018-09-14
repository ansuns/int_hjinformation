<?php
return [
    'language' => 'zh-CN',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'helper' => [
            'class'=>'common\helpers\Helper',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '192.168.99.100',
            'port' => 7369,
            'database' => 0,
            'dataTimeout' => 2*60*60
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'auth_item',
            'assignmentTable' => 'auth_assignment',
            'itemChildTable' => 'auth_item_child',
            //'db' => 'yangs',//main-local.php已配置则不用在此配置了
        ],
    ],
];
