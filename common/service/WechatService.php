<?php
/**
 * Created by PhpStorm.
 * User: YANGS
 * Date: 2018/9/26
 * Time: 17:36
 */
namespace common\service;

use Yii;

class WechatService extends \common\service\BasicService
{
    private static $_instance = null;

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            $config = \Yii::$app->params['wechat'];
            self::$_instance =  \EasyWeChat\Factory::officialAccount($config);
        }

        return self::$_instance;
    }
    private function __construct()
    {

    }


    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
}