<?php
namespace wechat\controllers;

use api\models\ApiUserLoginForm;
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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
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
