<?php
namespace wechat\controllers;

use api\models\ApiUserLoginForm;
use EasyWeChat\Factory;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use wechat\models\PasswordResetRequestForm;
use wechat\models\ResetPasswordForm;
use wechat\models\SignupForm;
use wechat\models\ContactForm;

/**
 * Site controller
 */
class DefaultController extends Controller
{
    public function actionIndex()
    {
        $config = Yii::$app->params['wechat'];
        $app = Factory::officialAccount($config);

        $app->server->push(function ($message) {
            return "您好！";
        });

        $response = $app->server->serve();

        // 将响应输出
        $response->send(); // Laravel 里请使用：return $response;

    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndexx()
    {
        if (!$this->checkSignature()) {
            return "error sign";
        }

        //验证通过后不再发送echostr,而是发送XML数据了
        if (array_key_exists("echostr" ,$_GET) && $_GET['echostr']) {
            echo $_GET['echostr'];
        }


        echo "success";
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $tmpArr = array($timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $signature = $tmpStr ){
            return true;
        }else{
            return false;
        }
    }
}
